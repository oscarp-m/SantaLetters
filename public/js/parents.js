document.addEventListener('DOMContentLoaded', () => {
    const loginForm = document.getElementById('parentLoginForm');
    const lettersContainer = document.getElementById('lettersContainer');
    const lettersList = document.getElementById('lettersList');

    loginForm.addEventListener('submit', async (e) => {
        e.preventDefault();

        const parentCode = document.getElementById('parentCodeInput').value.trim();

        if (!parentCode) {
            alert('Please enter your parent code');
            return;
        }

        // Show loading
        lettersList.innerHTML = '<div class="loading"><div class="spinner"></div><p>Loading letters...</p></div>';
        lettersContainer.classList.remove('hidden');

        try {
            const response = await fetch(`/api/letters/${encodeURIComponent(parentCode)}`);
            const data = await response.json();

            if (response.ok) {
                displayLetters(data.letters);
            } else {
                throw new Error(data.error || 'Failed to fetch letters');
            }
        } catch (error) {
            console.error('Error:', error);
            lettersList.innerHTML = `
                <div class="result error">
                    <h3>❌ Error</h3>
                    <p>Failed to load letters: ${error.message}</p>
                </div>
            `;
        }
    });

    function displayLetters(letters) {
        if (!letters || letters.length === 0) {
            lettersList.innerHTML = `
                <div class="no-letters">
                    <h3>📭 No letters yet</h3>
                    <p>No letters have been sent with this parent code yet.</p>
                </div>
            `;
            return;
        }

        lettersList.innerHTML = letters.map(letter => {
            const date = new Date(letter.created_at);
            const formattedDate = date.toLocaleDateString('en-US', { 
                year: 'numeric', 
                month: 'long', 
                day: 'numeric',
                hour: '2-digit',
                minute: '2-digit'
            });

            return `
                <div class="letter-card">
                    <div class="letter-card-header">
                        <div class="child-name">✉️ ${escapeHtml(letter.child_name)}</div>
                        <div class="letter-date">${formattedDate}</div>
                    </div>
                    
                    <div class="letter-message">
                        <strong>Letter to Santa:</strong><br>
                        ${escapeHtml(letter.message)}
                    </div>
                    
                    ${letter.item_name ? `
                        <div class="item-info">
                            <h4>🎁 Gift Information</h4>
                            <div class="item-details">
                                <strong>Item:</strong> ${escapeHtml(letter.item_name)}
                            </div>
                            <div class="item-details">
                                <strong>Estimated Price:</strong> ${escapeHtml(letter.price)}
                            </div>
                            ${letter.link ? `
                                <a href="${escapeHtml(letter.link)}" target="_blank" class="shop-link">
                                    🛍️ Shop for this item
                                </a>
                            ` : ''}
                        </div>
                    ` : ''}
                </div>
            `;
        }).join('');
    }

    function escapeHtml(unsafe) {
        if (!unsafe) return '';
        return unsafe
            .toString()
            .replace(/&/g, "&amp;")
            .replace(/</g, "&lt;")
            .replace(/>/g, "&gt;")
            .replace(/"/g, "&quot;")
            .replace(/'/g, "&#039;");
    }
});
