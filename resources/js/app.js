import "./common"


const form = document.querySelector('form');
const requiredElements = document.querySelectorAll('form [required]');

form.addEventListener('submit', function (e) {
        e.preventDefault();
        let valified = true;
        if(requiredElements) {
            requiredElements.forEach(element => {
                let error = element.parentElement.querySelector('.error');
                const labelTxt = element.parentElement.querySelector('label').innerText;

                if(element.value.trim() == '') {
                    if(error && labelTxt) {
                        error.innerHTML = labelTxt +  ' is required';
                        error.style.display = "block";
                        valified = false;
                    }
                } else {
                    if(error && labelTxt) {
                        error.innerHTML = '';
                        error.style.display = "none";
                    }
                }
            })
        }
        const email = document.querySelector('form input[type=email]');
        if(email) {
            let error = email.parentElement.querySelector('.error');
            if (!/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email.value)) {
                error.innerHTML = 'email format is invalid';
                error.style.display = "block";
                valified = false;
            } else {
                error.innerHTML = '';
                error.style.display = "none";
            }
        }
        if(valified) {
            this.submit();
        }
})



