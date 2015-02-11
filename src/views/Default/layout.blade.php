<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Administration | LaCrud</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" type="text/css" href="/packages/DevSwert/LaCrud/Default/css/datepicker/datepicker3.css" />
        <link rel="stylesheet" type="text/css" href="/packages/DevSwert/LaCrud/Default/css/datatables/dataTables.bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="/packages/DevSwert/LaCrud/Default/css/daterangepicker/daterangepicker-bs3.css" />
        <link rel="stylesheet" type="text/css" href="/packages/DevSwert/LaCrud/Default/css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" />
        <link rel="stylesheet" type="text/css" href="/packages/DevSwert/LaCrud/Default/css/multiselect/multi-select.css" />
        <link rel="stylesheet" type="text/css" href="/packages/DevSwert/LaCrud/Default/css/AdminLTE.css" />
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="skin-black">

		@yield('header')
		@yield('content')
		@yield('footer')

		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="//code.jquery.com/ui/1.11.1/jquery-ui.min.js" type="text/javascript"></script>
        <script src="//cdn.ckeditor.com/4.4.3/standard/ckeditor.js"></script>

        <script src="/packages/DevSwert/LaCrud/Default/js/plugins/daterangepicker/daterangepicker.js"></script>
        <script src="/packages/DevSwert/LaCrud/Default/js/plugins/datepicker/bootstrap-datepicker.js"></script>
        <script src="/packages/DevSwert/LaCrud/Default/js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
        <script src="/packages/DevSwert/LaCrud/Default/js/plugins/iCheck/icheck.min.js"></script>
        <script src="/packages/DevSwert/LaCrud/Default/js/plugins/datatables/jquery.dataTables.js"></script>
        <script src="/packages/DevSwert/LaCrud/Default/js/plugins/datatables/dataTables.bootstrap.js"></script>
        <script src="/packages/DevSwert/LaCrud/Default/js/plugins/multiselect/jquery.multi-select.js"></script>
        <script src="/packages/DevSwert/LaCrud/Default/js/plugins/multiselect/jquery.quicksearch.js"></script>
        <script src="/packages/DevSwert/LaCrud/Default/js/AdminLTE/app.js"></script>

		<script>
			$(document).ready(function(){
				if($('#dataTableInfo').length > 0){
			    	$('#dataTableInfo').DataTable();					
				}
                if( $('#editor1').length > 0 )
                    CKEDITOR.replace( 'editor1' );
                $('.datepicker').datepicker();
                if( $('#multiple-relation').length ){
                    $('#multiple-relation').multiSelect({
                        keepOrder: true,
                        selectableFooter: "<input type='text' class='form-control' autocomplete='off' placeholder='Search?'>",
                        selectionFooter: "<input type='text' class='form-control' autocomplete='off' placeholder='Search?'>",
                        selectableHeader: "<div class='custom-header'>Selectable items</div>",
                        selectionHeader: "<div class='custom-header'>Selection items</div>",
                        afterInit: function(ms){
                            var that = this,
                                $selectableSearch = that.$selectableUl.prev(),
                                $selectionSearch = that.$selectionUl.prev(),
                                selectableSearchString = '#'+that.$container.attr('id')+' .ms-elem-selectable:not(.ms-selected)',
                                selectionSearchString = '#'+that.$container.attr('id')+' .ms-elem-selection.ms-selected';

                            that.qs1 = $selectableSearch.quicksearch(selectableSearchString)
                            .on('keydown', function(e){
                                if (e.which === 40){
                                    that.$selectableUl.focus();
                                    return false;
                                }
                            });

                            that.qs2 = $selectionSearch.quicksearch(selectionSearchString)
                            .on('keydown', function(e){
                                if (e.which == 40){
                                    that.$selectionUl.focus();
                                    return false;
                                }
                            });
                        },
                        afterSelect: function(){
                            this.qs1.cache();
                            this.qs2.cache();
                        },
                        afterDeselect: function(){
                            this.qs1.cache();
                            this.qs2.cache();
                        }
                    });
                }
			});
		</script>

    </body>
</html>