function calculateReturndate() {
    let days = document.getElementById('membership').value;

    if (days != null) {
        let returnDate = new Date();
        returnDate.setDate(returnDate.getDate() + parseInt(days, 10));

        let day = returnDate.getDate();
        if (day < 10)
            day = '0' + day;
        let month = returnDate.getMonth() + 1;
        if (month < 10)
            month = '0' + month;
        let year = returnDate.getFullYear();

        document.getElementById("returndate").value = year + '-' + month + '-' + day;
    }
}

function cancel() {
    window.location = 'home';
}