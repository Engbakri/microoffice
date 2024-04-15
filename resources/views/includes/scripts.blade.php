<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDCn8TFXGg17HAUcNpkwtxxyT9Io9B_NcM" defer></script>
<script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/plugins/toaster/toastr.min.js') }}"></script>
<script src="{{ asset('assets/plugins/slimscrollbar/jquery.slimscroll.min.js') }}"></script>
<script src="{{ asset('assets/plugins/charts/Chart.min.js') }}"></script>
<script src="{{ asset('assets/plugins/ladda/spin.min.js') }}"></script>
<script src="{{ asset('assets/plugins/ladda/ladda.min.js') }}"></script>
<script src="{{ asset('assets/plugins/jquery-mask-input/jquery.mask.min.js') }}"></script>
<script src="{{ asset('assets/plugins/select2/js/select2.min.js') }}"></script>
<script src="{{ asset('assets/plugins/jvectormap/jquery-jvectormap-2.0.3.min.js') }}"></script>
<script src="{{ asset('assets/plugins/jvectormap/jquery-jvectormap-world-mill.js') }}"></script>
<script src="{{ asset('assets/plugins/daterangepicker/moment.min.js') }}"></script>
<script src="{{ asset('assets/plugins/daterangepicker/daterangepicker.js') }}"></script>
<script src="{{ asset('assets/plugins/jekyll-search.min.js') }}"></script>
<script src="{{ asset('assets/js/sleek.js') }}"></script>
<script src="{{ asset('assets/js/chart.js') }}"></script>
<script src="{{ asset('assets/js/date-range.js') }}"></script>
<script src="{{ asset('assets/js/map.js') }}"></script>
<script src="{{ asset('assets/js/custom.js') }}"></script>
<script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js') }}"></script>

<script>
    @if(Session::has('message'))
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
            toastr.success("{{ session('message') }}");
    @endif
  
    @if(Session::has('error'))
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
            toastr.error("{{ session('error') }}");
    @endif
  
    @if(Session::has('info'))
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
            toastr.info("{{ session('info') }}");
    @endif
  
    @if(Session::has('warning'))
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
            toastr.warning("{{ session('warning') }}");
    @endif
  </script>
<script>
     // display a modal (small modal)
  $(document).on('click', '#smallButton', function(event) {
      event.preventDefault();
      let href = $(this).attr('data-attr');
      $.ajax({
          url: href
          , beforeSend: function() {
              $('#loader').show();
          },
          // return the result
          success: function(result) {
              $('#smallModal').modal("show");
              $('#smallBody').html(result).show();
          }
          , complete: function() {
              $('#loader').hide();
          }
          , error: function(jqXHR, testStatus, error) {
              console.log(error);
              alert("Page " + href + " cannot open. Error:" + error);
              $('#loader').hide();
          }
          , timeout: 8000
      })
  });

  @yield('js')

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script language="JavaScript">
            // Listen for click on toggle checkbox
        $('#select-all').click(function(event) {   
            if(this.checked) {
                // Iterate each checkbox
                $(':checkbox').each(function() {
                    this.checked = true;                        
                });
            } else {
                $(':checkbox').each(function() {
                    this.checked = false;                       
                });
            }
        });
</script>
<script>
    ClassicEditor
    .create( document.querySelector( '#editor' ), {
      toolbar: {
    items: [
        'undo', 'redo',
        '|', 'heading',
        '|', 'fontfamily', 'fontsize', 'fontColor', 'fontBackgroundColor',
        '|', 'bold', 'italic', 'strikethrough', 'subscript', 'superscript', 'code',
        '|', 'link', 'uploadImage', 'blockQuote', 'codeBlock',
        '|', 'alignment',
        '|', 'bulletedList', 'numberedList', 'todoList', 'outdent', 'indent'
    ],
    shouldNotGroupWhenFull: true
},

        language: {
            // The UI will be English.
            ui: 'ar',

            // But the content will be edited in Arabic.
            content: 'ar'
        },
       
		
    } )
    .then( editor => {
        window.editor = editor;
    } )
    .catch( err => {
        console.error( err.stack );
    } );
</script>

<script type='text/javascript' src="{{ asset('froala/froala_editor.min.js') }}"></script>  	

<script>

  var changeDirection = function (dir, align) {
  // Wrap block tags.
  this.selection.save();
  this.html.wrap(true, true, true, true);
  this.selection.restore();

  // Get blocks.
  var elements = this.selection.blocks();

  // Save selection to restore it later.
  this.selection.save();

  for (var i = 0; i < elements.length; i++) {
    var element = elements[i];
    if (element != this.el) {
      this.$(element)
        .css('direction', dir)
        .css('text-align', align)
        .removeClass('fr-temp-div');
    }
  }

  // Unwrap temp divs.
  this.html.unwrap();

  // Restore selection.
  this.selection.restore();
}

FroalaEditor.DefineIcon('rightToLeft', {NAME: 'arrow-left', template: 'font_awesome'});
FroalaEditor.RegisterCommand('rightToLeft', {
  title: 'RTL',
  focus: true,
  undo: true,
  refreshAfterCallback: true,
  callback: function () {
    changeDirection.apply(this, ['rtl', 'right']);
  }
})

FroalaEditor.DefineIcon('leftToRight', {NAME: 'arrow-right', template: 'font_awesome'});
FroalaEditor.RegisterCommand('leftToRight', {
  title: 'LTR',
  focus: true,
  undo: true,
  refreshAfterCallback: true,
  callback: function () {
    changeDirection.apply(this, ['ltr', 'left']);
  }
})
  var editor = new FroalaEditor('#froala', {
  // Set custom buttons with separator between them. Also include the name
  // of the buttons  defined in customButtons.
  toolbarButtons: ['undo', 'redo' , 'bold', 'formatOL', 'formatUL', '|', 'rightToLeft', 'leftToRight'],
})  
</script>