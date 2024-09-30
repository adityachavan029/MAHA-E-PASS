window.onload = function () {
    var today = new Date().toISOString().split('T')[0];
    document.getElementById("input-date").setAttribute("min", today);
}


function calculateDate() {
    // Get the input date value
    var inputDate = document.getElementById("input-date").value;

    // Parse the input date string to a Date object
    var parsedInputDate = new Date(inputDate);

    // Add 30 days to the input date
    var outputDate = new Date(parsedInputDate.getTime() + (30 * 24 * 60 * 60 * 1000));

    // Format the output date as YYYY-MM-DD
    var formattedOutputDate = outputDate.toISOString().split('T')[0];

    // Set the value of the output date field
    document.getElementById("output-date").value = formattedOutputDate;
}
