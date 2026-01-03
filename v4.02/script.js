
function toggleDarkMode() {
    var element = document.body;
    var isDarkMode = element.classList.toggle("dark-mode");
    updateDarkModeIcon(isDarkMode)
    // Save theme preference in a cookie
    var expirationDate = new Date();
    expirationDate.setFullYear(expirationDate.getFullYear() + 1); // Set expiration to 1 year from now
    document.cookie = "theme=" + (isDarkMode ? "dark" : "light") + "; SameSite=None; Secure; expires=" + expirationDate.toUTCString();
}

function updateDarkModeIcon(isDarkMode) {
    var icon = document.getElementById("darkModeIcon");
    if (isDarkMode) {
        icon.classList.remove("fa-sun");
        icon.classList.add("fa-moon");
        console.log("aaaa");
    } else {
        icon.classList.remove("fa-moon");
        icon.classList.add("fa-sun");
    }
}

// Function to retrieve theme preference from cookie
function getThemePreference() {
    var cookies = document.cookie.split("; ");
    for (var i = 0; i < cookies.length; i++) {
        var cookie = cookies[i].split("=");
        if (cookie[0] === "theme") {
            return cookie[1];
        }
    }
    return null; // Return null if theme cookie is not found
}

//apply selected theme on page load
window.onload = function() {
    var themePreference = getThemePreference();
    if (themePreference === "dark") {
        document.body.classList.add("dark-mode");
        updateDarkModeIcon(true);
    }
}

/*

*/

var carousel = document.getElementById('carouselExample');
var readout = document.getElementById('carouselReadout');

if (readout) {
  function updateReadout() {
    var currentIndex = Array.from(document.querySelectorAll('.carousel-item')).indexOf(document.querySelector('.carousel-item.active'));
    var totalItems = document.querySelectorAll('.carousel-inner .carousel-item').length;
    readout.textContent = 'Image ' + (currentIndex + 1) + ' of ' + totalItems;
  }

  updateReadout();

  carousel.addEventListener('slid.bs.carousel', function () {
    updateReadout();
  });
}

//Comments
$(document).ready(function() {
    var userId = $('body').data('user-id');
  
    if (userId !== '') {
        console.log('User ID:', userId);
    } else {
        console.log('User not logged in');
    }
  
    loadComments();
  
    $('#comment-form').submit(function(event) {
        event.preventDefault();
        var commentText = $('#comment-text').val();
        if (commentText.trim() === '') {
            alert('Parašykite komentarą.');
            return;
        }
  
        if (!checkLoggedInUser()) {
            return;
        }
  
        $.post('add_comment.php', { comment: commentText, user_id: userId }, function(data) {
            $('#comment-text').val('');
            loadComments();
        })
    });
  
    function createReplyForm() {
        return $('<div class="comment-reply-form">' +
            '<textarea class="reply-text" placeholder="Parašyk savo atsakymą"></textarea>' +
            '<button class="cancel-reply">Atšaukti</button>' +
            '<button class="submit-reply">Pateikti</button>' +
            '</div>');
    }
  
    $(document).on('click', '.reply-comment-btn', function() {
        $('.comment-reply-form').remove();
        var replyForm = createReplyForm();
        $(this).closest('.comment').append(replyForm);
    });
  
    $(document).on('click', '.reply-reply-btn', function() {
        $('.comment-reply-form').remove();
        var replyForm = createReplyForm();
        $(this).closest('.reply').append(replyForm);
    });
  
    $(document).on('click', '.submit-reply', function() {
        var parentId = $(this).closest('.comment, .reply').data('comment-id');
        var replyText = $(this).siblings('.reply-text').val();
  
        if (!checkLoggedInUser()) {
            return;
        }
  
        $.post('add_reply.php', { comment_id: parentId, reply_text: replyText, user_id: userId }, function(data) {
            loadComments();
        })
    });
  
    $(document).on('click', '.cancel-reply', function() {
        $(this).closest('.comment-reply-form').remove();
    });
  
    $(document).on('click', '.delete-comment', function() {
        var commentId = $(this).data('comment-id');
        var commentElement = $(this).closest('.comment');
  
        $.post('delete_comment.php', { comment_id: commentId }, function(data) {
            commentElement.remove();
        })
    });
  
    $(document).on('click', '.delete-reply', function() {
        var replyId = $(this).data('reply-id');
        var replyElement = $(this).closest('.reply');
  
        $.post('delete_reply.php', { reply_id: replyId }, function(data) {
            replyElement.remove();
        })
    });
  
    function loadComments() {
        $.get('get_comments.php', function(data) {
            $('#comments-container').html(data);
        })
    }
  
    function checkLoggedInUser() {
        if (userId === '') {
            alert('Norėdami komentuoti, turite būti prisijungę');
            return false;
        }
        return true;
    }
  });
//PROFILE
var signInForm = document.getElementById("signInForm");
var signUpForm = document.getElementById("signUpForm");

var signInLink = document.getElementById("signInLink");
var signUpLink = document.getElementById("signUpLink");

if (signInForm && signUpForm) {
    signUpLink.addEventListener("click", function(event) {
        event.preventDefault();
        
        // Toggle the display of sign-in and sign-up forms
        signInForm.style.display = "none";
        signUpForm.style.display = "block";
    });

    signInLink.addEventListener("click", function(event) {
        event.preventDefault();
        
        // Toggle the display of sign-in and sign-up forms
        signUpForm.style.display = "none";
        signInForm.style.display = "block";
    });
}

var password = document.getElementById("password");
var confirm_password = document.getElementById("confirm_password");

if(password){
function validatePassword(){
    if(password.value != confirm_password.value) {
      confirm_password.setCustomValidity("Passwords Don't Match");
    } else {
      confirm_password.setCustomValidity('');
    }
  }
  password.onchange = validatePassword;
  confirm_password.onkeyup = validatePassword;
}


var changeNameButton = document.getElementById("changeNameBtn");

if(changeNameButton){
    changeNameButton.addEventListener("click", function() {
        var form = document.getElementById("nameForm");
        if (form.style.display === "none") {
            form.style.display = "block";
        } else {
            setTimeout(function() {
                form.style.display = "none";
            }, 200);
        }
    });
}

var changePasswordBtn = document.getElementById("changePasswordBtn");

if(changePasswordBtn){
    changePasswordBtn.addEventListener("click", function() {
        var form = document.getElementById("passwordForm");
        if (form.style.display === "none") {
            form.style.display = "block";
        } else {
            setTimeout(function() {
                form.style.display = "none";
            }, 200);
        }
    });
}