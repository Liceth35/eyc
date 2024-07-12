document.addEventListener('DOMContentLoaded', function() {
    const questions = document.querySelectorAll('.faq-question');
    
    questions.forEach(question => {
        question.addEventListener('click', () => {
            // Obtener la respuesta actual
            const currentAnswer = question.nextElementSibling;
            
            // Verificar si la respuesta actual está visible
            const isCurrentAnswerVisible = currentAnswer.style.display === 'block';
            
            // Ocultar todas las respuestas
            document.querySelectorAll('.faq-answer').forEach(answer => {
                answer.style.display = 'none';
            });
            
            // Mostrar la respuesta actual solo si no estaba visible
            if (!isCurrentAnswerVisible) {
                currentAnswer.style.display = 'block';
            }
        });
    });
});
