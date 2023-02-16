tinymce.init({
    selector: '#mytextarea',
    plugins: [
        'a11ychecker','advlist','advcode','advtable','autolink','checklist','export',
        'lists','link','image','charmap','preview','anchor','searchreplace','visualblocks',
        'powerpaste','fullscreen','formatpainter','insertdatetime','media','table','help','wordcount'
    ],
    toolbar: 'undo redo | formatpainter casechange blocks | bold italic backcolor | ' +
        'alignleft aligncenter alignright alignjustify | ' +
        'bullist numlist checklist outdent indent | removeformat | a11ycheck code table help'
});

//! Confirmatio for delete record
let myForm = document.querySelector(".myForm");

myForm.addEventListener("click", function (e) {
   e.preventDefault();
   
   Swal.fire({
      title: "آیا مطمئن هستید؟",
      text: "این محتوا برای همیشه پاک خواهد شد",
      icon: "question",
      showConfirmButton: true,
      confirmButtonText: "حذف کن",
      confirmButtonColor: "#198754",
      showCancelButton: true,
      cancelButtonText: "لغو کن",
      cancelButtonColor: "#dc3545",
   }).then((result) => {
      if (result.isConfirmed) {
         myForm.submit();
         Swal.fire({
            title: "با موفقیت حذف شد",
            icon: "success",
            showConfirmButton: true,
            confirmButtonText: "باشه",
         });
      } else {
         Swal.fire({
            title: "لغو شد",
            icon: "error",
            showConfirmButton: true,
            confirmButtonText: "باشه",
         });
      }
   });
});