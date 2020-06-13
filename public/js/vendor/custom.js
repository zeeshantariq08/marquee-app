/// delete Form
$(".btn-delete").click(function(event) {
   /* Act on the event */
   event.preventDefault();
   var action = $(this).attr("href");
   $("form#delete-form").attr("action", action);
   $("form#delete-form").submit();
});

$('a.confirm-delete').confirm({
    theme: 'modern',
   title: 'Confirm Please?',
   content: $(this).attr("msg"),
   type: 'dark',
   typeAnimated: true,
   draggable: false,
   buttons: {
       ok: {
           useBootstrap: false,
           text: "Yes!",
           btnClass: 'btn-danger',
           keys: ['enter'],
           action: function(){
                var action = this.$target.attr('href')
   $("form#delete-form").attr("action", action);
   $("form#delete-form").submit();
                console.log('the user clicked confirm');
           }
       },
       cancel: {
           text: "No",
           keys: ['esc'],
            cancel: function(){
                console.log('the user clicked cancel');
            }
       }
   }
});
// Confirmation msg
$('a.btn-confirm').confirm({
    theme: 'modern',
   title: 'Confirm Please?',
   content: $(this).attr("msg"),
   type: 'dark',
   typeAnimated: true,
   draggable: false,
   buttons: {
       ok: {
           useBootstrap: false,
           text: "Yes!",
           btnClass: 'btn-primary',
           keys: ['enter'],
           action: function(){
                location.href = this.$target.attr('href')
                console.log('the user clicked confirm');
           }
       },
       cancel: {
           text: "No",
           keys: ['esc'],
            cancel: function(){
                console.log('the user clicked cancel');
            }
       }
   }
});
$('.confirm-form').submit(function(){
    
    currentForm = this;    
    $.confirm({
        theme: 'modern',
        title: 'Confirm Please?',
        content: $(this).attr("msg"),
        type: 'dark',
        typeAnimated: true,
        draggable: false,
        buttons: {
            Confirm: function() {
                currentForm.submit();
            },
            Cancel: function() {
                // $(this).dialog('close');
            }
        }
    });
    return false;
});
$('.confirm-select').change(function(){
    
    currentForm = this;    
    $.confirm({
        theme: 'modern',
        title: 'Confirm Please?',
        content: $(this).attr("msg"),
        type: 'dark',
        typeAnimated: true,
        draggable: false,
        buttons: {
            Confirm: function() {
                currentForm.form.submit();
            },
            Cancel: function() {
                // $(this).dialog('close');
            }
        }
    });
    return false;
});
// User Active InActive Status Confirmation msg
$('a.confirm-status').confirm({
    theme: 'modern',
   title: 'Confirm Please?',
   content: $(this).attr("msg"),
   type: 'dark',
   typeAnimated: true,
   draggable: false,
   buttons: {
       ok: {
           useBootstrap: false,
           text: "Yes!",
           btnClass: 'btn-info',
           keys: ['enter'],
           action: function(){
                var action = this.$target.attr('href')
   $("form#status-form").attr("action", action);
   $("form#status-form").submit();
                console.log('the user clicked confirm');
           }
       },
       cancel: {
           text: "No",
           keys: ['esc'],
            cancel: function(){
                console.log('the user clicked cancel');
            }
       }
   }
});