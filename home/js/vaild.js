

// ID validation
function CheckID() {
  var num = document.getElementById("NationalId").value;
  var pattern = /(^[\+]?[\d]{14}$)/;
  if (num.search(pattern) == -1)
  document.getElementById('id_error').classList.remove('hidden');
  else
  document.getElementById('id_error').classList.add('hidden');
}
/*****Name */
function CheckName() {
  var nameValue= document.getElementById("nameInput").value;
  var namePattern = /^[A-Za-z\s]+$/
  if (!namePattern.test(nameValue))
       document.getElementById('name_error').classList.remove('hidden');
  else
      document.getElementById('name_error').classList.add('hidden');
}


/*****Email */
function CheckEmail() {
  var num = document.getElementById("Email").value;
  var pattern = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
  if (num.search(pattern) == -1)
  document.getElementById('email_error').classList.remove('hidden');
  else
  document.getElementById('email_error').classList.add('hidden');
}

/*********password */

function verifyPassword() {
  var pw = document.getElementById("Password").value;  
  
  //minimum password length validation 
  
  if (pw.length < 4 || pw.length > 15) {
    document.getElementById('password_error').classList.remove('hidden');
    return false;
    }
    else{
  document.getElementById('password_error').classList.add('hidden');
    }
  return true;
}  

function repatedPasword(){
  var password = document.getElementById("Password").value;
  var rePassword = document.getElementById("RepeatPassword").value;
  if (password!== rePassword) {
    document.getElementById("reppassword_error").classList.remove('hidden');
  
  }
  else {
    document.getElementById("reppassword_error").classList.add('hidden');
  }

}

//Birth date validation

$(function(){
  var dtToday = new Date();
  var month = dtToday.getMonth()+1;
  var day = dtToday.getDate();
  var year = dtToday.getFullYear();
  if(month < 10)
  month = '0' + month.toString();
  if(day < 10)
  day = '0' + day.toString();
  var maxDate = year + '-' + month + '-' + day;
  $('#last_dental_visit').attr('max', maxDate);
  
})

/***Mobile */

function CheckMobile(){
  var num = document.getElementById("Mobile").value;
  var pattern = /(^[\+]?[\d]{11}$)/;
  if (num.search(pattern) == -1)
  document.getElementById('mobile_error').classList.remove('hidden');
  else
  document.getElementById('mobile_error').classList.add('hidden');
}



