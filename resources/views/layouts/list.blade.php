@extends('layouts.app')
@section('content')
	<div class="container-fluid">
		<div class="row justify-content-end">
			<div class="col-auto">
                <form class="form-inline position-relative d-inline-block my-2" action="{{ route($table.'.search') }}" method="POST">
                    @csrf
                    @isset($txtSearch)
                        <a href="{{ route($table.'.index') }}" class="waves-effect waves-light btn-flat left prefix">
                            <i class="fas fa-times" style="color: #02368E;"></i>
                        </a>
                    @endisset
                    <input class="form-control" type="text" class="validate" required name="txtSearch" id="search" value="{{ (isset($txtSearch))? $txtSearch :'' }}" placeholder="Buscar" aria-label="Buscar">
                    <button class="btn position-absolute btn-search" type="submit" data-toggle="tooltip" data-placement="right" title="Buscar">
                        <i class="fas fa-search"></i>
                    </button>
                </form>
                {{-- @can($table.'.create') --}}
                    <a href="{{ route($table.'.create') }}" class="btn btn-success mx-5" data-toggle="togle" data-placement="right" title="Agregar Agregar registro">
                        <i class="fas fa-plus fa-1x" style="color:#E5EFFF"></i> Agregar
                    </a>
                {{-- @endcan --}}
			</div>
			<div class="col-md-12 col-lg-12">
				@if ((session('danger') && session('danger') != "") || (session('info') && session('info') != ""))
					<div class="alert alert-info alert-dismissible fade show {{ (session('danger')) }}" role="alert">
						<strong>{{ (session('danger'))?session('danger'):session('info') }}</strong>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</div>
				@endif
			</div>

			<div class="col-md-12 col-lg-12">
				@yield('list')
			</div>
		</div>
	</div>
@endsection
@section('scripts')
	<script src="{{ asset('sweetalert2/sweetalert2.min.js')}}"></script>
	<script src="{{ asset('js/vue.js')}}"></script>
	<script src="{{ asset('js/axios.js') }}"></script>
	<script>
		$(document).ready(function () {
			const alert = async (message,frmDelete) => {
				const time = 9500;
				const { value: data } = await Swal.fire({
					title: message,
					text: "¡No podras revertir esta acción!",
					icon: 'warning',
					cancelButtonColor: '#5d4037',
					confirmButtonColor: '#ffa726',
					confirmButtonText: '¡Si Borrar registro!',
					showCancelButton: true,
				})
					if (data) {
						frmDelete.submit();
					}

			}
			$('.btnAlertRemove').click(function (e) {
				$('.contentAlert').hide('fast');
			});
			$(".btnDelete").click(function (e) {
				e.preventDefault();
				console.log('Click')
				//var tag 		= $(this).attr('tag');
				const frmDelete 	= $(this).parent('.frmDelete');
				alert("Esta seguro de borrar este registro ",frmDelete);
			});
		});
	</script>
	@yield('scripts-list')
@endsection

