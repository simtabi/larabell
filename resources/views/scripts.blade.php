@larabellToastJs

<script>

    function getValue($value, $default){
        if( $value ) {
            return $value;
        }
        return $default;
    }

    function ToastNotification(event) {
        if ($.fn.toast) {
            $.toast({
                // Text that is to be shown in the toast
                text               : getValue(event.text, "Don't forget to star the repository if you like it."),
                // Optional heading to be shown on the toast
                heading            : getValue(event.heading, 'Note'),
                // Type of toast icon
                icon               : getValue(event.icon, 'warning'),
                // fade, slide or plain
                showHideTransition : getValue(event.showHideTransition, 'fade'),
                // Boolean value true or false
                allowToastClose    : getValue(event.allowToastClose, true),
                // false to make it sticky or number representing the miliseconds as time after which toast needs to be hidden
                hideAfter          : getValue(event.hideAfter, 3000),
                // false if there should be only one toast at a time or a number representing the maximum number of toasts to be shown at a time
                stack              : getValue(event.stack, 5),
                // bottom-left or bottom-right or bottom-center or top-left or top-right or top-center or mid-center or an object representing the left, right, top, bottom values
                position           : getValue(event.position, 'top-right'),


                // Text alignment i.e. left, right or center
                textAlign          : getValue(event.textAlign, 'left'),
                // Whether to show loader or not. True by default
                loader             : getValue(event.loader, true),
                // Background color of the toast loader
                loaderBg           : getValue(event.loaderBg, '#9EC600') ,
                // will be triggered before the toast is shown
                beforeShow         :  function () {getValue(event.beforeShow, null)},
                // will be triggered after the toast has been shown
                afterShown         : function () {getValue(event.afterShown, null)},
                // will be triggered before the toast gets hidden
                beforeHide         : function () {getValue(event.beforeHide, null)},
                // will be triggered after the toast has been hidden
                afterHidden        : function () {getValue(event.afterHidden, null)},
            });
        }
    }

    function SwalModal(event) {

        if (event.isModal === true){
            Swal.fire({
                icon              : getValue(event.icon, 'warning'),
                title             : getValue(event.title, null),
                text              : getValue(event.text, null),
                footer            : getValue(event.footer, null),
                position          : getValue(event.position, 'top-right'),
                showConfirmButton : getValue(event.showConfirmButton, false),
                timerProgressBar  : getValue(event.timerProgressBar, true),
                didOpen           : function(toast) {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })
        }else {
            Swal.fire({
                icon               : getValue(event.icon, 'warning'),
                title              : getValue(event.title, null),
                html               : getValue(event.html, null),
                showCancelButton   : getValue(event.showCancelButton, true),
                confirmButtonColor : getValue(event.confirmButtonColor, '#3085d6'),
                cancelButtonColor  : getValue(event.cancelButtonColor, '#d33'),
                confirmButtonText  : getValue(event.confirmButtonText, 'Cool'),
                reverseButtons     : getValue(event.reverseButtons, true),
            }).then((result) => {
                if (result.isConfirmed) {
                    if (event.eventMethodParams) {
                        return livewire.emit(event.method, event.eventMethodParams)
                    }else {
                        return livewire.emit(event.method)
                    }
                } else if (result.isDenied) {
                    return livewire.emit(event.method, event.eventMethodParams)
                }
            });
        }

    }

    document.addEventListener('DOMContentLoaded', function() {

        if (Livewire === undefined) {
            return;
        }

        Livewire.on('larabellToast:fire', event => {
            return ToastNotification(event);
        });

        Livewire.on('larabellSwal:fire', event => {
            return SwalModal(event);
        });

    });

</script>
