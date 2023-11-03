<!DOCTYPE html>
<html>
<head>
    <title>Validação de Código</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Insira o código de validação para acessar o Dashboard</div>
                    <div class="card-body">
                        @if(session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        @if(session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('validate') }}">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col">
                                    <input type="text" name="code1" id="code1" class="form-control text-center" required maxlength="1" pattern="\d">
                                </div>
                                <div class="form-group col">
                                    <input type="text" name="code2" id="code2" class="form-control text-center" required maxlength="1" pattern="\d">
                                </div>
                                <div class="form-group col">
                                    <input type="text" name= "code3" id="code3" class="form-control text-center" required maxlength="1" pattern="\d">
                                </div>
                                <div class="form-group col">
                                    <input type="text" name="code4" id="code4" class="form-control text-center" required maxlength="1" pattern="\d">
                                </div>
                                <div class="form-group col">
                                    <input type="text" name="code5" id="code5" class="form-control text-center" required maxlength="1" pattern="\d">
                                </div>
                                <div class="form-group col">
                                    <input type="text" name="code6" id="code6" class="form-control text-center" required maxlength="1" pattern="\d">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Validar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const codeInputs = document.querySelectorAll('input[name^="code"]');

            codeInputs.forEach(function(input, index) {
                input.addEventListener('input', function(event) {
                    const value = event.target.value;

                    if (value.length === 1) {
                        // Pule para o próximo campo quando um dígito for inserido
                        if (index < codeInputs.length - 1) {
                            codeInputs[index + 1].focus();
                        }
                    }
                });

                // Permita que o usuário apague e edite dígitos
                input.addEventListener('keydown', function(event) {
                    if (event.key === 'Backspace' && input.value === '') {
                        // Volte para o campo anterior quando Backspace é pressionado
                        if (index > 0) {
                            codeInputs[index - 1].focus();
                        }
                    }
                });
            });
        });
    </script>
</body>
</html>
