<body>
    <x-layout>
        <div class="container py-md-5">
           
            <div class="row align-items-center">
                <div class="col-lg-7 py-3 py-md-5">
 
                    <h1>{{ __('teste.teste') }}</h1>
                    <p>Current locale: {{ app()->getLocale() }}</p>
                    <p>Current Session value: {{ session('locale') }}</p>
                    <p class="lead text-muted">Are you sick of short tweets and impersonal &ldquo;shared&rdquo; posts that are reminiscent of the late 90&rsquo;s email forwards? We believe getting back to actually writing is the key to enjoying the internet again.</p>
                </div>
                <div class="col-lg-5 pl-lg-5 pb-3 py-lg-5">
                    <form id="registration-form" method="POST">
                      @csrf <!-- CSRF token -->
                        <div class="form-group">
                            <label for="username-register" class="text-muted mb-1"><small>Username</small></label>
                            
                          {{-- 
                                {{ old('username') }} <- recupera o valor antigo do campo passando o name do input 
                            --}}

                            <input value="{{old('username')}}" name="username" id="username-register" class="form-control" type="text" placeholder="Pick a username" autocomplete="off" />
                              
                          {{-- 
                            //ativa mensagem de erro automatica ao submitar o form (obs: não se aplica com ajax. é preciso passar a rota no action e protegê-la com a diretiva @csrf)
                            --}}
                            @error('username')
                                <p class="m-0 small alert alert-danger shadow-sm">{{ $message }}</p>
                            @enderror
  
                        <div class="form-group">
                            <label for="email-register" class="text-muted mb-1"><small>Email</small></label>
                            <input name="email" id="email-register" class="form-control" type="text" placeholder="you@example.com" autocomplete="off" />
                        </div>
  
                        <div class="form-group">
                            <label for="password-register" class="text-muted mb-1"><small>Password</small></label>
                            <input name="password" id="password-register" class="form-control" type="password" placeholder="Create a password" />
                        </div>
  
                        <div class="form-group">
                            <label for="password-register-confirm" class="text-muted mb-1"><small>Confirm Password</small></label>
                            <input name="password_confirmation" id="password-register-confirm" class="form-control" type="password" placeholder="Confirm password" />
                        </div>
                        
                        <button type="submit" class="py-3 mt-4 btn btn-lg btn-success btn-block">Sign up for OurApp</button>
                    </form>
                </div>
            </div>
        </div>
    </x-layout>
    <script>
    $('#registration-form').submit(function(event) {
    event.preventDefault();
    var formData = $(this).serialize(); 

    $.ajax({
        type: "POST",
        url: '{{ route('display_data') }}', 
        dataType: 'json',
        data: formData,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  
        },
        success: function(response) {
            console.log("Requisição AJAX bem-sucedida: ", response);
            alert(response.message);  
        },
        error: function(xhr, status, error) {
            console.log("Requisição AJAX falhou: ", status, error);

            if (xhr.status === 422 && xhr.responseJSON && xhr.responseJSON.errors) {
                var validationErrors = xhr.responseJSON.errors;
                var errorMessage = "Erro de validação:\n";
                console.log('validationErrors:', JSON.stringify(validationErrors, null, 2));

                for (var field in validationErrors) {
                    if (validationErrors.hasOwnProperty(field)) {
                        console.log('validationErrors :' + validationErrors);
                        console.log('errorMessage:' + errorMessage);
                        console.log(validationErrors[field]);
                        errorMessage += field + ": " + validationErrors[field].join(", ") + "\n";

                        console.log('error message pós loop for:'+ errorMessage);
                    }
                }

                alert(errorMessage);
            } else {
                alert('Erro na requisição: ' + (xhr.responseJSON ? xhr.responseJSON.message : error));
            }
        }
    });
});
    </script>
</body>
</html>