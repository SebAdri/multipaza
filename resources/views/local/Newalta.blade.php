@extends('cabecera')
@section('contenido')
<style type="text/css">
  .dual-list .list-group {
      margin-top: 8px;
  }

  .list-left li, .list-right li {
      cursor: pointer;
  }

  .list-arrows {
      padding-top: 100px;
  }

  .list-arrows button {
      margin-bottom: 20px;
  }
</style>
<form method="POST" action="{{ route('locales.store') }}"   enctype="multipart/form-data">
  {!! csrf_field() !!}
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Crear Local</h2>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <div class="row">
          <h2>Subcategorias</h2>

            <div class="dual-list list-left col-md-5">
              <div class="well text-right">
                <div class="row">
                  <div class="col-md-10">
                    <div class="input-group">
                      <span class="input-group-addon glyphicon glyphicon-search"></span>
                      <input type="text" name="SearchDualList" class="form-control" placeholder="Buscar" />
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="btn-group">
                      <a class="btn btn-default selector" title="select all"><i class="glyphicon glyphicon-unchecked"></i></a>
                    </div>
                  </div>
                </div>
                <ul id="subcategorias[]" class="list-group">
                  @foreach ($subcategorias as $subcategoria)
                    <li class="list-group-item"  value="{{$subcategoria->id}}">{{$subcategoria->nombre}}</li>
                  @endforeach
                </ul>
              </div>
            </div>

            <div class="list-arrows col-md-1 text-center">
              <button type="button" class="btn btn-default btn-sm move-right">
                <span class="glyphicon glyphicon-chevron-right"></span>
              </button>

              <button type="button" class="btn btn-default btn-sm move-left">
                <span class="glyphicon glyphicon-chevron-left"></span>
              </button>              
            </div>

            <div class="dual-list list-right col-md-5">
              <div class="well">
                <div class="row">
                  <div class="col-md-2">
                    <div class="btn-group">
                      <a class="btn btn-default selector" title="select all"><i class="glyphicon glyphicon-unchecked"></i></a>
                    </div>
                  </div>
                  <div class="col-md-10">
                    <div class="input-group">
                      <input type="text" name="SearchDualList" class="form-control" placeholder="Buscar" />
                      <span class="input-group-addon glyphicon glyphicon-search"></span>
                    </div>
                  </div>
                </div>
                <ul class="list-group">
                  {{-- <li id="subcategorias[]">seleccione uno</li> --}}
                </ul>
              </div>
            </div>

          </div>

          <div class="ln_solid"></div>
            <div class="row form-group">
              <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                <button type="submit" class="btn btn-success">Grabar</button>
                {{-- <button class="btn btn-primary" type="reset">Resetar</button> --}}
                <a href="/administrador/subcategorias" class="btn btn-primary" type="button" id="volver" name="volver">Volver</a>
              </div>
            </div>

        </div>
      </div>
    </div>
  </div>
</form>
@stop
@push('scripts')
<script type="text/javascript">
        $(function () {
            $('body').on('click', '.list-group .list-group-item', function () {
                $(this).toggleClass('active');
            });
            $('.list-arrows button').click(function () {
                var $button = $(this), actives = '';
                if ($button.hasClass('move-left')) {
                    actives = $('.list-right ul li.active');
                    actives.clone().appendTo('.list-left ul');
                    actives.remove();
                } else if ($button.hasClass('move-right')) {
                    actives = $('.list-left ul li.active');
                    actives.clone().appendTo('.list-right ul');
                    actives.remove();
                }
            });
            $('.dual-list .selector').click(function () {
                var $checkBox = $(this);
                if (!$checkBox.hasClass('selected')) {
                    $checkBox.addClass('selected').closest('.well').find('ul li:not(.active)').addClass('active');
                    $checkBox.children('i').removeClass('glyphicon-unchecked').addClass('glyphicon-check');
                } else {
                    $checkBox.removeClass('selected').closest('.well').find('ul li.active').removeClass('active');
                    $checkBox.children('i').removeClass('glyphicon-check').addClass('glyphicon-unchecked');
                }
            });
            $('[name="SearchDualList"]').keyup(function (e) {
                var code = e.keyCode || e.which;
                if (code == '9') return;
                if (code == '27') $(this).val(null);
                var $rows = $(this).closest('.dual-list').find('.list-group li');
                var val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();
                $rows.show().filter(function () {
                    var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
                    return !~text.indexOf(val);
                }).hide();
            });
            // $('.list-group').paginathing({
            //   perPage: 7,
            //   // limitPagination: 9,
            //   containerClass: 'panel-footer',
            //   // pageNumbers: true,
            //   firstText: 'Primero',
            //   lastText: 'Último'
            // });
        });
    </script>
@endpush
