@larabellToastJs

<script>

    function getValue($value, $default){
        if( $value ) {
            return $value;
        }
        return $default;
    }

    window.livewire.on('larabellSwal:fire', event => {

        if (event.isConfirmModal === true){

            var componentName = getValue(event.componentName);

            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
            })

            swalWithBootstrapButtons.fire({
                icon               : getValue(event.icon, 'warning'),
                title              : getValue(event.title, null),
                text               : getValue(event.text, null),
                html               : getValue(event.html, null),
                showCancelButton   : getValue(event.showCancelButton, true),
                cancelButtonText   : getValue(event.cancelButtonText, "No, I don't approve!"),
                confirmButtonColor : getValue(event.confirmButtonColor, '#3085d6'),
                cancelButtonColor  : getValue(event.cancelButtonColor, '#d33'),
                confirmButtonText  : getValue(event.confirmButtonText, 'Yes, I approve!'),
                reverseButtons     : getValue(event.reverseButtons, true),
            }).then((result) => {
                if (result.isConfirmed) {
                    swalWithBootstrapButtons.fire(
                        getValue(event.swalConfirmedTitle, 'Confirmed'),
                        getValue(event.swalConfirmedText, 'Successfully confirmed!'),
                        'success'
                    )

                    var eventMethod       = getValue(event.eventMethod);
                    var eventMethodParams = getValue(event.eventMethodParams);

                    if (eventMethod && componentName) {
                        if (componentName) {
                            window.livewire.emitTo(componentName, eventMethod, eventMethodParams)
                        }else {
                            window.livewire.emit(eventMethod, eventMethodParams)
                        }
                    }

                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    swalWithBootstrapButtons.fire(
                        getValue(event.swalConfirmCancelledTitle, 'Cancelled'),
                        getValue(event.swalConfirmCancelledText, 'Cancelled successfully!!'),
                        'error'
                    )

                    var eventCancelledMethod       = getValue(event.eventCancelledMethod);
                    var eventCancelledMethodParams = getValue(event.eventCancelledMethodParams);

                    if (eventCancelledMethod && componentName) {
                        if (componentName) {
                            window.livewire.emitTo(componentName, eventCancelledMethod, eventCancelledMethodParams)
                        }else {
                            window.livewire.emit(eventCancelledMethod, eventCancelledMethodParams)
                        }
                    }

                    if (event.eventCancelledMethod) {
                        window.livewire.emitTo(event.eventCancelledMethod, event.eventCancelledMethodParams)
                    }
                }
            })

        }else {
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
        }
    })

    window.livewire.on('larabellToast:fire', event => {
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
    })

</script>
