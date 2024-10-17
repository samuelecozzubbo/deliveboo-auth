@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        {{-- FORM UTENTE --}}
                        <form method="POST" action="{{ route('register') }}" onsubmit="return validateForm()"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="mb-4 row">
                                <label for="name" class="col-md-4 col-form-label text-md-right"
                                    id="nameErrorLabel">{{ __('Name') }}</label>
                                {{-- NOME UTENTE --}}
                                <div class="col-md-6 ">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    {{-- Errori front-end --}}
                                    <small class="text-danger" id="nameError"></small>

                                    {{-- errori back-end --}}
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                {{-- Errori front-end --}}
                                <div class="col-md-6 position-relative">
                                    <div class="tooltip-error col" id="nameTooltip">Il Nome è obbligatorio e deve avere
                                        almeno 2 caratteri.</div>
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="email" class="col-md-4 col-form-label text-md-right"
                                    id="emailErrorLabel">{{ __('E-Mail Address') }}</label>
                                {{-- EMAIL --}}
                                <div class="col-md-6 position-relative">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email"
                                        oninput="this.value = this.value.toLowerCase()">

                                    {{-- Errori front-end --}}
                                    <small class="text-danger" id="emailError"></small>

                                    {{-- errori back-end --}}
                                    @error('email')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                {{-- Errori front-end --}}
                                <div class="col-md-6 position-relative">
                                    <div class="tooltip-error col" id="emailTooltip">La mail è obbligatoria e deve rispttare
                                        i criteri.</div>
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="password" class="col-md-4 col-form-label text-md-right"
                                    id="passwordErrorLable">{{ __('Password') }}</label>
                                {{-- PASSWORD --}}
                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password">

                                    {{-- Errori front-end --}}
                                    <small class="text-danger" id="passwordError"></small>

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                {{-- Errori front-end --}}
                                <div class="col-md-6 position-relative">
                                    <div class="tooltip-error col" id="passwordTooltip">La password deve avere almeno 8
                                        caratteri e contenere una maiuscola,una minuscola e un carattere speciale.</div>
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right"
                                    id="password-confirmErrorLabel">{{ __('Confirm Password') }}</label>
                                {{-- CONTROLLO PASSWORD --}}
                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password">
                                </div>
                                {{-- Errori front-end --}}
                                <small class="text-danger" id="password-confirmError"></small>

                                {{-- Errori front-end --}}
                                <div class="col-md-6 position-relative">
                                    <div class="tooltip-error col" id="password-confirmTooltip">Le password devono
                                        corrispondere.</div>
                                </div>
                            </div>

                            {{-- <div class="mb-4 row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary" id="btn-register" disabled>
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div> --}}
                            {{-- </form> --}}
                            {{-- ************************************************************************************ --}}
                            {{-- Form ristorante --}}
                            {{-- Name --}}
                            {{-- <form class="row g-3" method="POST"
                            enctype="multipart/form-data" onsubmit="return validateForm()" id="form2">
                            @csrf --}}
                            <div class="col-md-6 position-relative">
                                <label for="restaurant_name" class="form-label " id="nameErrorLabelRestaurant">Nome del
                                    ristorante
                                    (*)</label>
                                <input type="text" class="form-control {{-- @error('name') is-invalid @enderror --}}" id="restaurant_name"
                                    name="restaurant_name" placeholder="Scrivi il nome del ristorante"
                                    value="{{ old('restaurant_name') }}" required>
                                {{-- Errori front-office --}}
                                <div class="tooltip-error col" id="nameRestaurantTooltip">Il Nome del ristorante è
                                    obbligatorio e deve
                                    avere
                                    almeno 2
                                    caratteri.</div>
                                <small class="text-danger" id="nameErrorRestaurant"></small>
                                {{-- Errorri back-office --}}
                                {{-- se esiste l'errore name stampa un messaggio anche sotto l'input --}}
                                @error('restaurant_name')
                                    <small class="text-danger"> {{ $message }} </small>
                                @enderror

                            </div>
                            {{-- Address --}}
                            <div class="col-md-6 position-relative">
                                <label for="address" class="form-label" id="addressErrorLabel">Indirizzo (*)</label>
                                <input type="text" class="form-control {{-- @error('address') is-invalid @enderror --}}" id="address"
                                    name="address" placeholder="Inserisci l'indirizzo" value="{{ old('address') }}"
                                    required>
                                {{-- Errori front-office --}}
                                <div class="tooltip-error" id="addressTooltip">L'indirizzo del ristorante è obbligatorio e
                                    deve avere
                                    almeno
                                    5
                                    caratteri.</div>
                                <small class="text-danger" id="addressError"></small>
                                {{-- @error('address')
                                <small class="text-danger"> {{ $message }} </small>
                            @enderror --}}
                            </div>
                            {{-- Piva --}}
                            <div class="col-md-6 position-relative">
                                <label for="piva" class="form-label" id="pivaErrorLabel">P.Iva (11 caratteri)
                                    (*)</label>
                                <input type="text" class="form-control {{-- @error('piva') is-invalid @enderror --}}" id="piva"
                                    name="piva" placeholder="Inserisci la tua P.Iva" value="{{ old('piva') }}"
                                    required pattern="\d{11}">
                                {{-- Errori front-office --}}
                                <div class="tooltip-error" id="pivaTooltip">La P.iva del ristorante è obbligatoria e deve
                                    avere 11
                                    caratteri.</div>
                                <small class="text-danger" id="pivaError"></small>
                                {{-- @error('piva')
                                    <small class="text-danger"> {{ $message }} </small>
                                @enderror --}}
                            </div>

                            {{-- caricamento img --}}
                            <div class="col-12">
                                <label for="img" class="form-label">Immagine (*)</label>
                                <input type="file" name="img" id="img" class="form-control" multiple
                                    accept="image/*" required>

                                {{-- anteprima dell'immagine caricata --}}
                                {{-- <img src="/img/no_img.jpg" class="thumb-mini" id="thumb"> --}}
                            </div>
                            {{-- @error('img')
                                    <small class="text-danger"> {{ $message }} </small>
                                @enderror --}}

                            {{-- Descrizione --}}
                            <div class="col-12">
                                <label for="description" class="form-label">Descrizione del ristorante</label>
                                <textarea class="form-control" name="description" id="description" cols="30" rows="10"
                                    placeholder="Descrivi il tuo ristorante">{{ old('description') }}</textarea>
                            </div>

                            {{-- chechbox per le Tipologia di ristorante --}}
                            <label for="types" class="form-label">Tipologia di ristorante: (*)</label>
                            <div class="btn-group d-flex flex-wrap" role="group"
                                aria-label="Basic checkbox toggle button group">
                                @foreach ($types as $type)
                                    <input name="types[]" value="{{ $type->id }}" type="checkbox" class="btn-check"
                                        id="type-{{ $type->id }}" autocomplete="off" @if (in_array($type->id, old('types', []))) checked @endif>
                                    <label class="btn btn-outline-primary"
                                        for="type-{{ $type->id }}">{{ $type->name }}</label>
                                    <small class="text-danger" name="typesError"></small>
                                @endforeach
                                <small class="text-danger" id="typesError" style="display:none;">Seleziona almeno una
                                    tipologia di ristorante.</small>
                            </div>
                            {{-- BOTTONI PER INVIO FORM
                            ******************************************************************************** --}}
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary" id="submitBtn" disabled>Invia</button>
                            </div>
                            <div class="col-12">
                                <button type="reset" class="btn btn-primary">Cancella</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>

    {{-- funzioni --}}
    {{-- SCRIPT INVIO FORMS --}}
    <script>
        {{-- funzioni --}}
        //VALIDAZIONE FORM
        function validateForm() {

            let valid = true;
            //prendo elementi in pagina
            //NAME User
            const nameError = document.getElementById('nameError');
            const nameErrorLabel = document.getElementById('nameErrorLabel');
            const nameInput = document.getElementById('name').value;
            //EMAIL
            const emailError = document.getElementById('emailError');
            const emailErrorLabel = document.getElementById('emailErrorLabel');
            const emailInput = document.getElementById('email').value;
            //PASSWORD
            const passwordError = document.getElementById('passwordError');
            const passwordErrorLabel = document.getElementById('passwordErrorLabel');
            const passwordInput = document.getElementById('password').value;
            //PASSWORD-CONFIRM
            const passwordConfirmError = document.getElementById('password-confirmError');
            const passwordConfirmErrorLabel = document.getElementById('password-confirmErrorLabel');
            const passwordConfirmInput = document.getElementById('password').value;
            //NAME REStAURANT
            const nameErrorR = document.getElementById('nameErrorRestaurant');
            const nameErrorLabelR = document.getElementById('nameErrorLabelRestaurant');
            const nameInputR = document.getElementById('restaurant_name').value;
            //ADDRESS
            const addressError = document.getElementById('addressError');
            const addressErrorLabel = document.getElementById('addressErrorLabel');
            const addressInput = document.getElementById('address').value;
            //PIVA
            const pivaError = document.getElementById('pivaError');
            const pivaErrorLabel = document.getElementById('pivaErrorLabel');
            const pivaInput = document.getElementById('piva').value;

            // validazione nome
            if (nameInput.length < 2) {
                //NAME
                nameError.innerHTML = "Il Nome deve avere almeno due caratteri.";
                nameErrorLabel.style = "color:red";
                nameInput.style = "border-color:red";
                valid = false;

            } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(emailInput)) {
                //EMAIL CON REGEX @ E .
                emailError.innerHTML = "L'indirizzo email deve essere un formato valido.";
                emailErrorLabel.style = "color:red";
                emailInput.style = "border-color:red";
                valid = false;
            } else if (!/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$/.test(passwordInput)) {
                //PASSWORD
                passwordError.innerHTML = "Formato non corretto";
                passwordErrorLabel.style = "color:red";
                passwordInput.style = "border-color:red";
                valid = false;
            } else if (passwordInput !== passwordConfirmInput) {
                //PASSWORD CONFIRM
                passwordConfirmError.innerHTML = "Formato non corretto CONFIRM";
                passwordConfirmErrorLabel.style = "color:red";
                passwordConfirmInput.style = "border-color:red";
                valid = false;
            } else if (nameInputR.length < 2) {
                //NAME
                nameErrorR.innerHTML = "Il Nome del ristorante deve avere almeno due caratteri.";
                nameErrorLabelR.style = "color:red";
                nameInputR.style = "border-color:red";
                valid = false;

            } else if (addressInput.length < 5) {
                //ADDRESS
                addressError.innerHTML = "L'indirizzo del ristorante deve avere almeno cinque caratteri.";
                addressErrorLabel.style = "color:red";
                addressInput.style = "border-color:red";
                valid = false;
            } else if (pivaInput.length != 11) {
                //ADDRESS
                pivaError.innerHTML = "La partita iva deve avere 11 caratteri.";
                pivaErrorLabel.style = "color:red";
                pivaInput.style = "border-color:red";
                valid = false;
            }
            return valid;
        }

//Listener per i campi
document.getElementById('restaurant_name').addEventListener('input', checkFormRestaurantName);
document.getElementById('address').addEventListener('input', checkFormRestaurantAddress);
document.getElementById('piva').addEventListener('input', checkFormRestaurantPiva);
document.getElementById('name').addEventListener('input', checkFormUserName);
document.getElementById('email').addEventListener('input', checkFormUserEmail);
document.getElementById('password').addEventListener('input', checkFormUserPassword);
document.getElementById('password-confirm').addEventListener('input', checkFormUserPasswordConfirm);

let validNameR = false;
let validAddress = false;
let validPiva = false;
let validName = false;
let validEmail = false;
let validPswd = false;
let validPswdConfirm = false;
let validTypes = false;

// Funzioni di validazione per i singoli campi
function checkFormRestaurantName() {
    const nameR = document.getElementById('restaurant_name').value;
    const nameTooltipR = document.getElementById('nameRestaurantTooltip');
    validNameR = nameR.length >= 2;
    toggleTooltip(validNameR, nameTooltipR);
    buttonActivate();
}

function checkFormRestaurantAddress() {
    const address = document.getElementById('address').value;
    const addressTooltip = document.getElementById('addressTooltip');
    validAddress = address.length >= 5;
    toggleTooltip(validAddress, addressTooltip);
    buttonActivate();
}

function checkFormRestaurantPiva() {
    const piva = document.getElementById('piva').value;
    const pivaTooltip = document.getElementById('pivaTooltip');
    validPiva = piva.length === 11;
    toggleTooltip(validPiva, pivaTooltip);
    buttonActivate();
}

function checkFormUserName() {
    const name = document.getElementById('name').value;
    const nameTooltip = document.getElementById('nameTooltip');
    validName = name.length >= 2;
    toggleTooltip(validName, nameTooltip);
    buttonActivate();
}

function checkFormUserEmail() {
    const email = document.getElementById('email').value;
    const emailTooltip = document.getElementById('emailTooltip');
    validEmail = /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
    toggleTooltip(validEmail, emailTooltip);
    buttonActivate();
}

function checkFormUserPassword() {
    const password = document.getElementById('password').value;
    const passwordTooltip = document.getElementById('passwordTooltip');
    validPswd = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$/.test(password);
    toggleTooltip(validPswd, passwordTooltip);
    buttonActivate();
}

function checkFormUserPasswordConfirm() {
    const password = document.getElementById('password').value;
    const passwordConfirm = document.getElementById('password-confirm').value;
    const passwordConfirmTooltip = document.getElementById('password-confirmTooltip');
    validPswdConfirm = password === passwordConfirm;
    toggleTooltip(validPswdConfirm, passwordConfirmTooltip);
    buttonActivate();
}

// Funzione per mostrare o nascondere le tooltip
function toggleTooltip(isValid, tooltipElement) {
    if (isValid) {
        tooltipElement.classList.remove('visible');
    } else {
        tooltipElement.classList.add('visible');
    }
}

// Funzione per abilitare o disabilitare il bottone di invio
function buttonActivate() {
    const allValid = validNameR && validAddress && validPiva && validName && validEmail && validPswd && validPswdConfirm && validTypes;
    document.getElementById('submitBtn').disabled = !allValid;
}

// TYPES VALIDATION
const typeCheckboxes = document.querySelectorAll('input[name="types[]"]');
typeCheckboxes.forEach(checkbox => {
    checkbox.addEventListener('change', checkFormRestaurantTypes);
});

function checkFormRestaurantTypes() {
    validTypes = Array.from(typeCheckboxes).some(checkbox => checkbox.checked);
    const typesError = document.getElementById('typesError');
    if (validTypes) {
        typesError.style.display = 'none';
    } else {
        typesError.style.display = 'inline';
    }
    buttonActivate();
}

// funzione che cambia l'anteprima del file caricato (opzionale)
// function showImg(event) {
//     const thumb = document.getElementById('thumb');
//     thumb.src = URL.createObjectURL(event.target.files[0]);
// }

    </script>
@endsection
