
function getId(id) {
    const data = { id: id }
    const jsonData = JSON.stringify(data)
    delete_memo(jsonData)
}


document.addEventListener('DOMContentLoaded', () => {
    const delMemo = document.querySelectorAll("#delete_memo")

    delMemo.forEach((item) => {
        item.addEventListener('click', (e) => {
            e.preventDefault()
            showLoader()
        }
        )
    })


})

const backdrop = document.getElementById('backdrop');
const spinnerContainer = document.getElementById('spinner-container');

function showLoader() {
    backdrop.style.display = 'block';
    spinnerContainer.style.display = 'block';
}

function hideLoader() {
    backdrop.style.display = 'none';
    spinnerContainer.style.display = 'none';
}

// Usage example (call these functions based on your request logic)
showLoader()

// Simulate some processing time (replace with your actual logic)
setTimeout(() => {
    hideLoader();
}, 100); // Hide after 2 seconds



function delete_memo(jsonData) {
    fetch("delete_process.php", {
        method: "POST",
        headers: {
            'Content-Type': 'Application/json'
        },
        body: jsonData
    }
    )
        .then(function (response) {

            if (!response.ok) {
                throw new Error('Network response was not ok');
              //  window.location.href = response.url;
            } else {
                return response.json();
            }
        })
        .then((data) => {
            const flashMessage = data.flash_message;
            const redirectUrl = 'index.php';
            if (flashMessage) {
                showPopup(flashMessage, 3000);
            }
            localStorage.setItem("flashMessage", JSON.stringify(flashMessage))
            
            window.location.href = redirectUrl;
            console.log('Success:', data)
        }).catch(err => {
            console.log('Error:', err)
        });


}


// const urlParams = new URLSearchParams(window.location.search);
// const flashMessage = urlParams.get('flash_message');
const flashMessage = document.querySelector("span").dataset.msg

const flashMessage2 = JSON.parse(localStorage.getItem("flashMessage"))

if (flashMessage) {
    showPopup(flashMessage, 3000);
}
if (flashMessage2) {
    showPopup(flashMessage2, 3000);
    localStorage.removeItem("flashMessage")
}




function showPopup(message, duration = 3000) {
    const popup = document.getElementById('popupMessage');
    const popupText = document.getElementById('popupText');
  
    // Set popup text
    popupText.textContent = message;
  
    // Add active class to show popup
    popup.classList.add('active');
  
    // Remove active class after duration
    setTimeout(function() {
      popup.classList.remove('active');
    }, duration);
  }
  
