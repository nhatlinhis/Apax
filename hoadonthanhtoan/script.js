function generatePDF(){
     const element = document.getElementById("xuathoadon");
     html2pdf()
     .from(element)
     .save();
}