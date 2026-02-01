async function handleForm(e, action) {
    e.preventDefault();
    const formData = new FormData(e.target);
    formData.append('action', action);

    const msgBox = document.getElementById('response-msg');
    msgBox.innerText = 'Обработка...';
    msgBox.className = 'message';

    try {
        // Путь к API абсолютный от корня
        const response = await fetch('/backend/api.php', {
            method: 'POST',
            body: formData
        });
        const result = await response.json();

        if (result.status === 'success') {
            if (result.redirect) {
                window.location.href = result.redirect;
            } else {
                msgBox.innerText = result.message;
                msgBox.classList.add('success');
            }
        } else {
            msgBox.innerText = result.message;
            msgBox.classList.add('error');
        }
    } catch (error) {
        msgBox.innerText = 'Ошибка соединения';
        msgBox.classList.add('error');
    }
}