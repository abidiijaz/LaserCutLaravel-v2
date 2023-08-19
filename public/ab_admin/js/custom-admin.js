// function performCheckboxAjax(checkboxClass, url) {
//     var checkbox = $('.' + checkboxClass);
//     var isChecked = checkbox.is(':checked');
//     var categoryId = checkbox.data('id');
//     console.log(categoryId);
//     // console.log(isChecked);
//     $.ajax({
//         type: 'POST',
//         url: url,
//         data: {
//             status: isChecked ? 1 : 0,
//             id: categoryId,

//         },
//         headers: {
//             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//         },
//         dataType: 'json',
//         success: function (data) {
//             alert(response.message);
//         },
//         error: function (error) {
//             console.log(error);
//         }
//     });
// }
