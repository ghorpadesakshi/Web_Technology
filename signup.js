// JavaScript to toggle the PRN field based on the selected role
function togglePRNField() {
    const role = document.getElementById('role').value;
    const studentFields = document.getElementById('studentFields');

    if (role === 'student') {
        studentFields.style.display = 'block'; // Show PRN field for students
    } else {
        studentFields.style.display = 'none'; // Hide PRN field for mentors
    }
}

// On page load, hide PRN field if mentor is selected by default
window.onload = togglePRNField;
