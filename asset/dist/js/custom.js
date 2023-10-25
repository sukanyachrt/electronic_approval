function dateCurrent() {
    var currentDate = new Date();
    var monthNames = [
        "มกราคม", "กุมภาพันธ์", "มีนาคม",
        "เมษายน", "พฤษภาคม", "มิถุนายน",
        "กรกฎาคม", "สิงหาคม", "กันยายน",
        "ตุลาคม", "พฤศจิกายน", "ธันวาคม"
    ];
    var day = currentDate.getDate();
    var month = currentDate.getMonth();
    var year = currentDate.getFullYear();
   return day + " " + monthNames[month] + " " + (year + 543);
   // $('#divDatecurrent').text(formattedDate)
}