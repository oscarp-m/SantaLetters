require('dotenv').config();
const express = require('express');
const sqlite3 = require('sqlite3').verbose();
const OpenAI = require('openai');
const cors = require('cors');
const bodyParser = require('body-parser');
const path = require('path');

const app = express();
const PORT = process.env.PORT || 3000;

// Middleware
app.use(cors());
app.use(bodyParser.json());
app.use(express.static('public'));

// Initialize OpenAI
const openai = new OpenAI({
  apiKey: process.env.OPENAI_API_KEY
});

// Initialize Database
const db = new sqlite3.Database('./santa_letters.db', (err) => {
  if (err) {
    console.error('Error opening database:', err);
  } else {
    console.log('Database connected');
    initializeDatabase();
  }
});

// Create tables if they don't exist
function initializeDatabase() {
  db.run(`
    CREATE TABLE IF NOT EXISTS letters (
      id INTEGER PRIMARY KEY AUTOINCREMENT,
      child_name TEXT NOT NULL,
      parent_code TEXT NOT NULL,
      message TEXT NOT NULL,
      item_name TEXT,
      price TEXT,
      link TEXT,
      created_at DATETIME DEFAULT CURRENT_TIMESTAMP
    )
  `, (err) => {
    if (err) {
      console.error('Error creating table:', err);
    } else {
      console.log('Database tables ready');
    }
  });
}

// Routes

// Submit a letter to Santa
app.post('/api/letters', async (req, res) => {
  const { childName, parentCode, message } = req.body;

  if (!childName || !parentCode || !message) {
    return res.status(400).json({ error: 'All fields are required' });
  }

  let itemInfo = {
    item_name: 'Gift item',
    price_range: 'Price varies',
    search_term: 'gift'
  };

  // Try to use OpenAI to extract item information
  try {
    const completion = await openai.chat.completions.create({
      model: "gpt-3.5-turbo",
      messages: [
        {
          role: "system",
          content: "You are a helpful assistant that extracts gift information from children's letters to Santa. Extract the main item they want, estimate a reasonable price range, and suggest a generic search term for finding it online. Return your response as JSON with fields: item_name, price_range, search_term."
        },
        {
          role: "user",
          content: `Extract gift information from this letter to Santa: "${message}"`
        }
      ],
      temperature: 0.7,
    });

    try {
      const response = completion.choices[0].message.content;
      // Try to parse JSON response
      const jsonMatch = response.match(/\{[\s\S]*\}/);
      if (jsonMatch) {
        const parsed = JSON.parse(jsonMatch[0]);
        itemInfo = { ...itemInfo, ...parsed };
      }
    } catch (parseError) {
      console.error('Error parsing OpenAI response:', parseError);
    }
  } catch (aiError) {
    console.error('OpenAI API error (using fallback):', aiError.message);
    // Fallback: Try to extract a simple item name from the message
    const words = message.toLowerCase().split(/\s+/);
    const commonItems = ['bike', 'doll', 'toy', 'game', 'book', 'lego', 'skateboard', 'robot', 'puzzle', 'ball'];
    const foundItem = commonItems.find(item => words.includes(item));
    if (foundItem) {
      itemInfo.item_name = foundItem.charAt(0).toUpperCase() + foundItem.slice(1);
      itemInfo.search_term = foundItem;
    }
  }

  try {
    // Generate a shopping link (using Google Shopping as example)
    const searchTerm = encodeURIComponent(itemInfo.search_term || itemInfo.item_name);
    const link = `https://www.google.com/search?tbm=shop&q=${searchTerm}`;

    // Save to database
    db.run(
      `INSERT INTO letters (child_name, parent_code, message, item_name, price, link) 
       VALUES (?, ?, ?, ?, ?, ?)`,
      [childName, parentCode, message, itemInfo.item_name, itemInfo.price_range, link],
      function(err) {
        if (err) {
          console.error('Database error:', err);
          return res.status(500).json({ error: 'Failed to save letter' });
        }
        res.json({
          success: true,
          id: this.lastID,
          message: 'Letter sent to Santa!',
          itemInfo: {
            item_name: itemInfo.item_name,
            price: itemInfo.price_range,
            link: link
          }
        });
      }
    );
  } catch (error) {
    console.error('Error processing letter:', error);
    res.status(500).json({ error: 'Failed to process letter' });
  }
});

// Get letters by parent code
app.get('/api/letters/:parentCode', (req, res) => {
  const { parentCode } = req.params;

  db.all(
    `SELECT id, child_name, message, item_name, price, link, created_at 
     FROM letters 
     WHERE parent_code = ? 
     ORDER BY created_at DESC`,
    [parentCode],
    (err, rows) => {
      if (err) {
        console.error('Database error:', err);
        return res.status(500).json({ error: 'Failed to fetch letters' });
      }
      res.json({ letters: rows });
    }
  );
});

// Health check endpoint
app.get('/api/health', (req, res) => {
  res.json({ status: 'ok', message: 'Santa\'s workshop is running!' });
});

// Start server
app.listen(PORT, () => {
  console.log(`🎅 Santa's Letter Service running on http://localhost:${PORT}`);
});

// Graceful shutdown
process.on('SIGINT', () => {
  db.close((err) => {
    if (err) {
      console.error('Error closing database:', err);
    } else {
      console.log('Database connection closed');
    }
    process.exit(0);
  });
});
