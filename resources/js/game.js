const word_length = document.getElementById('game') ? document.getElementById('game').dataset.length : 0;
const word_attempts = document.getElementById('game') ? document.getElementById('game').dataset.attempts : 0;
const game_id = document.getElementById('game') ? document.getElementById('game').dataset.id : 0;
//const win_text = document.getElementById('win_text');
const password_view = document.getElementById('password_view');
const private_lobby = document.getElementById('private_lobby');
const copy_game = document.getElementById('copy_game');

let current_word = '';

/*const win = function (idx){
    for (let i = 0; i < word_attempts; i++) {
        for (let j = 0; j < word_length; j++) {
            let id = i * word_length + j + 1;
            let letter_el = document.getElementById('letter-' + id);

            if (id >= Math.floor((idx - 1) / word_length) * word_length + 1 && id <= idx) {
                letter_el.classList.remove('text-light');
                letter_el.classList.add('text-success');
            }
            win_text.classList.remove('d-none');
            letter_el.disabled = true;
        }
    }
}*/

const sendJson = function (link, body = null){
    let xhr = new XMLHttpRequest();
    xhr.open('POST', link, false);
    xhr.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
    xhr.withCredentials = true;
    xhr.send(JSON.stringify(body));

    if (xhr.status == 200) {
        return JSON.parse(xhr.responseText);
    }
    else{
        return false;
    }
}

if (word_attempts) {
    for (let i = 0; i < word_attempts; i++) {
        for (let j = 0; j < word_length; j++) {
            let id = i * word_length + j + 1;
            document.getElementById('letter-' + id).onkeyup = (event) => {

                let letter = String.fromCharCode(event.keyCode);
                let letter_el_now = document.getElementById('letter-' + id);
                let letter_el_next = document.getElementById('letter-' + (id + 1));
                let letter_el_prev = document.getElementById('letter-' + (id - 1));

                if (letter.match(/^[a-zA-Z]*$/)) {
                    letter_el_next && letter_el_next.focus();
                    current_word += letter;
                    if (id % word_length === 0 || id === word_length * word_attempts) {
                        let result = sendJson('/game/check', {
                            id: game_id,
                            word: current_word
                        });
                        current_word = '';
                        if (result.data.status === 'ok') {
                            let j = 0;
                            for (let i = Math.floor((id - 1) / word_length) * word_length + 1; i <= id; i++) {
                                let letter_el = document.getElementById('letter-' + i);
                                if (result.data.letter[j] === 2) {
                                    letter_el.classList.remove('text-light');
                                    letter_el.classList.add('text-success');
                                } else if (result.data.letter[j] === 1) {
                                    letter_el.classList.remove('text-light');
                                    letter_el.classList.add('text-warning');
                                } else {
                                    letter_el.classList.remove('text-light');
                                    letter_el.classList.add('text-white-50');
                                }
                                j++;
                                letter_el.disabled = true;
                            }
                        } else if (result.data.status === 'win' || result.data.status === 'lose') {
                            location.reload();
                        }
                    }
                    letter_el_now.value = letter;
                } else if (event.keyCode === 8) {
                    current_word = current_word.substring(0, current_word.length - 1);
                    if (letter_el_prev) {
                        letter_el_prev.focus();
                        letter_el_prev.value = '';
                    } else {
                        letter_el_now.value = '';
                    }
                } else {
                    letter_el_now.value = '';
                }
            };
        }
    }
}

private_lobby && private_lobby.checked && password_view.classList.remove('d-none');
private_lobby && (private_lobby.onchange = () => {
    if (private_lobby.checked) {
        password_view.classList.remove('d-none');
    }
    else {
        password_view.classList.add('d-none');
    }
});

copy_game && (copy_game.onclick = () => {
    navigator.clipboard.writeText(copy_game.dataset.link).then(() => {});
});
