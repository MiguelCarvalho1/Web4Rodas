@extends('layouts.app')

@section('content')

<div class="container-scroller">
  <div class="row justify-content-center">
    <div class="col-md-8">
       <div class="card"> 
        
        <div class="container-fluid page-body-wrapper full-page-wrapper">
          <div class="content-wrapper d-flex align-items-center auth px-0">
            <div class="row w-100 mx-0">
              <div class="col-lg-4 mx-auto">
                <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                  <h3 class="fw-light">Login</h3>
                  <form class="pt-3">
                    <div class="form-group">
                      <input type="email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Nome">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Palavra-Passe">
                    </div>
                    <div class="mt-3">
                      <div class="form-check">
                        <label class="form-check-label text-muted">
                          <input type="checkbox" class="form-check-input">
                          Lembrar da Autenticação
                        </label>
                      </div>
                    </div>
                    <div class="mt-3">
                      <a class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" href="../../veiculo/carro">Entrar</a>
                    </div>
                    <div class="mt-2">
                      <a href="#" class="auth-link text-black">Esqueceu-se da Palavra-Passe?</a>
                    </div>
                    <div class="text-center mt-4 fw-light">
                      Não tens Conta? <a href="register" class="text-primary">Regista-te</a>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
        </div>


        
        </div>
      </div>
       
    
    
  </div>
</div>




@endsection
