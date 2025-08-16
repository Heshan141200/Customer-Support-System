//const faqItems = document.querySelectorAll('.faq-item');

// faqItems.forEach(item => {
//     const question = item.querySelector('.faq-question');
//     const answer = item.querySelector('.faq-answer');

//     question.addEventListener('click', () => {
//         // Toggle the answer
//         answer.style.display = answer.style.display === 'block' ? 'none' : 'block';
        
//         // Toggle the question background color
//         question.classList.toggle('active');
//     });
// });

const faqItems = document.querySelectorAll('.faq-item');

faqItems.forEach(item => {
    const question = item.querySelector('.faq-question');
    const answer = item.querySelector('.faq-answer');

    question.addEventListener('click', () => {
        // Close all other open answers
        faqItems.forEach(i => {
            if (i !== item) {
                i.querySelector('.faq-answer').style.display = 'none';
                i.querySelector('.faq-question').classList.remove('active');
            }
        });

        // Toggle the selected answer
        answer.style.display = answer.style.display === 'block' ? 'none' : 'block';
        question.classList.toggle('active');
    });
});

