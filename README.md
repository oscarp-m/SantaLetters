# 🎅 SantaLetters - Hack the Halls 2025 🎄

A festive web application where kids can send letters to Santa about what they want for Christmas, and parents can view their wishes with AI-powered price lookups and shopping links!

## ✨ Features

- **Kid-Friendly Interface**: Simple and festive design for children to write letters to Santa
- **Parent Dashboard**: Secure parent view to see what their kids asked for
- **AI-Powered Gift Analysis**: Uses ChatGPT (OpenAI API) to:
  - Extract gift items from children's letters
  - Estimate price ranges
  - Generate shopping links to help parents find the items
- **Parent Codes**: Secure system where parents create codes that kids use, allowing parents to view only their children's letters
- **Beautiful Design**: Festive theme with snowfall animations and holiday colors

## 🚀 Quick Start

### Prerequisites

- Node.js (v14 or higher)
- An OpenAI API key ([Get one here](https://platform.openai.com/api-keys))

### Installation

1. Clone this repository:
```bash
git clone https://github.com/oscarp-m/SantaLetters.git
cd SantaLetters
```

2. Install dependencies:
```bash
npm install
```

3. Create a `.env` file (copy from `.env.example`):
```bash
cp .env.example .env
```

4. Edit `.env` and add your OpenAI API key:
```env
OPENAI_API_KEY=your_actual_api_key_here
PORT=3000
```

5. Start the server:
```bash
npm start
```

6. Open your browser and navigate to:
```
http://localhost:3000
```

## 📖 How to Use

### For Kids:
1. Go to the main page (`http://localhost:3000`)
2. Enter your name
3. Get a "Parent Code" from your parents
4. Write your letter to Santa telling him what you want
5. Click "Send to Santa!" 
6. Santa's helper (ChatGPT) will find information about your gift!

### For Parents:
1. Create a unique "Parent Code" (any text you want - e.g., "Smith2025")
2. Give this code to your children when they write their letters
3. Go to the Parent Dashboard (`http://localhost:3000/parents.html`)
4. Enter your Parent Code to view all letters from your kids
5. See the gift items, estimated prices, and shopping links!

## 🛠️ Technology Stack

- **Backend**: Node.js with Express
- **Database**: SQLite3 (file-based, no setup required)
- **AI**: OpenAI GPT-3.5-turbo for gift analysis
- **Frontend**: Vanilla HTML, CSS, and JavaScript
- **Styling**: Custom CSS with festive animations

## 📁 Project Structure

```
SantaLetters/
├── server.js              # Main Express server
├── package.json           # Node.js dependencies
├── .env.example          # Environment variables template
├── .gitignore            # Git ignore rules
├── README.md             # This file
├── santa_letters.db      # SQLite database (created automatically)
└── public/               # Frontend files
    ├── index.html        # Kid's letter writing page
    ├── parents.html      # Parent dashboard
    ├── css/
    │   └── styles.css    # All styles
    └── js/
        ├── app.js        # Letter form logic
        └── parents.js    # Parent dashboard logic
```

## 🔒 Security Notes

- Never commit your `.env` file with real API keys
- Parent codes are stored in plain text - use unique codes
- This is a simple project for family use, not production-grade security
- The database file (`santa_letters.db`) contains all letters locally

## 🎁 API Endpoints

### POST `/api/letters`
Submit a new letter to Santa
- **Body**: `{ childName, parentCode, message }`
- **Returns**: Letter confirmation with AI-analyzed gift info

### GET `/api/letters/:parentCode`
Retrieve all letters for a parent code
- **Params**: `parentCode`
- **Returns**: Array of letters with gift information

### GET `/api/health`
Health check endpoint
- **Returns**: Server status

## 🌟 Future Enhancements

- User authentication for parents
- Email notifications when kids send letters
- Image uploads of desired gifts
- Wishlist export to PDF
- Multi-language support

## 📝 License

ISC

## 🎄 Happy Holidays!

Made with ❤️ for Hack the Halls 2025

