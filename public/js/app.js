document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('letterForm');
    const resultDiv = document.getElementById('result');

    form.addEventListener('submit', async (e) => {
        e.preventDefault();

        const childName = document.getElementById('childName').value.trim();
        const parentCode = document.getElementById('parentCode').value.trim();
        const message = document.getElementById('message').value.trim();

        // Show loading state
        const submitBtn = form.querySelector('.submit-btn');
        const originalBtnText = submitBtn.textContent;
        submitBtn.textContent = '🎅 Sending to Santa...';
        submitBtn.disabled = true;

        resultDiv.className = 'result hidden';

        try {
            const response = await fetch('/api/letters', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    childName,
                    parentCode,
                    message
                })
            });

            const data = await response.json();

            if (response.ok) {
                // Success!
                resultDiv.className = 'result success';
                resultDiv.innerHTML = `
                    <h3>✨ Letter sent to Santa! ✨</h3>
                    <p><strong>Great news, ${childName}!</strong> Santa received your letter!</p>
                    ${data.itemInfo ? `
                        <div style="margin-top: 15px; padding: 15px; background: white; border-radius: 8px;">
                            <h4 style="color: #667eea; margin-bottom: 10px;">🎁 What Santa found:</h4>
                            <p><strong>Item:</strong> ${data.itemInfo.item_name}</p>
                            <p><strong>Price Range:</strong> ${data.itemInfo.price}</p>
                            <p style="margin-top: 10px;">
                                <a href="${data.itemInfo.link}" target="_blank" class="shop-link">
                                    🔍 Help your parents find it!
                                </a>
                            </p>
                        </div>
                    ` : ''}
                    <p style="margin-top: 15px;">Your parents can view your letter using the parent code!</p>
                `;

                // Clear form
                form.reset();
            } else {
                throw new Error(data.error || 'Failed to send letter');
            }
        } catch (error) {
            console.error('Error:', error);
            resultDiv.className = 'result error';
            resultDiv.innerHTML = `
                <h3>❌ Oops!</h3>
                <p>Something went wrong: ${error.message}</p>
                <p>Please try again!</p>
            `;
        } finally {
            submitBtn.textContent = originalBtnText;
            submitBtn.disabled = false;
        }
    });
});
