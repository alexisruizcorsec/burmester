Vue.component('login', {
    template: /*html*/ `
    <div class="container">
    <!-- Outer Row -->
    <div class="row justify-content-center">
      <div class="col-xl-10 col-lg-12 col-md-9">
        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <img
                      src="img/logo.svg"
                      alt="logo_movil"
                      class="d-md d-lg-none"
                      style="width: 150px; height: 150px;"
                    />
                    <h1 class="h4 text-gray-900 mb-4">¡Bienvenido!</h1>
                  </div>
                  <form class="user" id="login">
                    <div class="form-group">
                      <input
                        type="email"
                        class="form-control form-control-user"
                        name="usuario"
                        v-model="usuarioVue"
                        placeholder="Correo electrónico..."
                        required
                      />
                    </div>
                    <div class="form-group">
                      <input
                        type="password"
                        class="form-control form-control-user"
                        name="pass"
                        v-model="passVue"
                        placeholder="Contraseña"
                        required
                      />
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input
                          type="checkbox"
                          class="custom-control-input"
                          id="customCheck"
                        />
                        <label
                          class="custom-control-label"
                          for="customCheck"
                          >Recuérdame</label
                        >
                      </div>
                    </div>
                    <div class="form-group" id="validaLogin"></div>
                    <div v-if="usuarioVue != '' && passVue != ''">
                      <button
                        class="btn btn-primary btn-user btn-block"
                        type="submit"
                      >
                        Iniciar sesión
                      </button>
                    </div>
                    <div v-else>
                      <button
                        class="btn btn-primary btn-user btn-block disabled"
                      >
                        Iniciar sesión
                      </button>
                    </div>
                  </form>
                  <hr />
                  <div class="text-center">
                    <a class="small" href="forgot-password.html"
                      >¿Olvidó su contraseña?</a
                    >
                  </div>
                  <div class="text-center">
                    <a class="small" href="register.html"
                      >¡Crea una cuenta!</a
                    >
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>   
    `,
    data() {
        return {
            usuarioVue: '',
            passVue: ''
        }
    }
})

new Vue({
    el: '#app'
})

let login = document.querySelector('#login')

login.addEventListener('submit', function (e) {
    e.preventDefault()

    let validaLogin = document.querySelector('#validaLogin')
    let datos = new FormData(login)

    fetch('vendor/system/login/console/login.app', {
            method: 'POST',
            body: datos
        })
        .then(res => res.json())
        .then(data => {
            if (data === 'error') {
                validaLogin.innerHTML = `
              <div class="alert alert-danger" role="alert">
                  Llena todos los campos
              </div>
              `
            } else {
                validaLogin.innerHTML = `
              ${data}
              `
            }
        })

})