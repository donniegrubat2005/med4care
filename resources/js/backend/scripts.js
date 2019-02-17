 // Custom script
 var mainUrl = $('#mainUrl').attr('uval');

 var doc = $(document);

 $(function () {
     // Is Cosumer Active
     doc.on('change', '#isActive', function () {

         var urlArr = $(location).attr("href").split('/');
         var userId = urlArr[urlArr.length - 1];

         $.ajaxSetup({
             headers: {
                 'X-XSRF-TOKEN': decodeURIComponent(/XSRF-Token=([^;]*)/ig.exec(document.cookie)[1])
             }
         });

         var isActive;

         if ($(this).is(':checked')) {
             $('#statusLabel span')
                 .removeClass('badge-danger ')
                 .removeClass('text-danger')
                 .addClass('text-primary')
                 .text('Activating...');
             isActive = 1;
         } else {
             $('#statusLabel span')
                 .removeClass('badge-success')
                 .removeClass('text-primary')
                 .addClass('text-danger')
                 .text('Deactivating...');
             isActive = 0;
         }
         $.ajax({
             type: "post",
             url: mainUrl + '/admin/auth/active',
             data: {
                 'status': isActive,
                 'userId': userId
             },
             success: function (response) {
                window.location.reload();
             }
         });

     })
 });


 $(function () {
     //  Edit blade script
     doc.on('click', '#add-documents', function () {
         var clone = $('#file-holder').clone();
         clone.removeClass('d-none');
         clone.find('input[type=file]').attr('name', 'files[]');
         $('.files-content').append(clone.removeAttr('id'));

     })
     doc.on('click', '.rmvDoc', function () {
         var fileHolder = $('.files-content').find('.form-group');
         if (fileHolder.length < 2) {
             alert('This field Cannot be remove.')
         } else {
             $(this).parent().parent().parent().remove();
         }
     })


     // create blade script
     doc.on('click', '#btnCDocument', function () {
         var clone = $('#file-holder').clone();
         clone.removeClass('d-none');
         clone.find('input[type=file]').attr('name', 'files[]');
         $('.files-content').append(clone.removeAttr('id'));

     });

     doc.on('click', '.btnCRmvDoc', function () {
         var fileHolder = $('.files-content').find('.form-group');
         if (fileHolder.length < 2) {
             alert('This field Cannot be remove.')
         } else {
             $(this).parent().parent().parent().remove();
         }
     });

     // Register blade script
     doc.on('change', '#userRole', function () {
         var userType = $(this).val();
         var content = $('#doc-content');

         switch (userType) {
             case 'team-owner':
                 content.removeClass('d-none');
                 var clone = $('#file-holder').clone();
                 clone.removeClass('d-none');
                 clone.find('input[type=file]').attr('name', 'file[]').attr('required', true);
                 $('#file-content').append(clone.removeAttr('id'));
                 break;
             case 'user':
                 content.addClass('d-none');
                 $('#file-content').html(null);
                 break;
         }
     });

     // user registration
     doc.on('click', '#btnAddFile', function () {
         var clone = $('#file-holder').clone();
         clone.removeClass('d-none');
         clone.find('input[type=file]').attr('name', 'file[]').attr('required', true);
         $('#file-content').append(clone.removeAttr('id'));
     });

     doc.on('click', '.rmvFile', function () {
         var fileHolder = $('#file-content').find('.input-group');
         if (fileHolder.length < 2) {
             alert('This field Cannot be remove.')
         } else {
             $(this).parent().parent().remove();
         }
     });


 })


 // For account view & controller
 $(function () {
     doc.on('click', '.accntDeleteFile', function () {
         var $this = $(this);
         if (confirm('Are you sure you want to delete this file')) {
             var file = $this.parent().siblings('.card-body').find('img').attr('id');
             var docId = $this.attr('id');

             $.get(mainUrl + "/account/delete_document/" + docId + "/" + file,
                 function (data, textStatus, jqXHR) {
                     if (data === true) {
                         window.location.reload();
                     }
                 }
             );
         }
     });

 });


 $("#editImgInp").change(function () {
     get_image(this);
 });


 $("#createImg").change(function () {
     get_image(this);
 });

 function get_image(input) {
     if (input.files && input.files[0]) {
         var reader = new FileReader();
         reader.onload = function (e) {
             $('.profile-image').show().html('<img src="#" name="image-file" id="chosse-image" class="user-image" />');
             $('#chosse-image').attr('src', e.target.result);
         };
         reader.readAsDataURL(input.files[0]);
     }
 }