<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
      Sign Up | Aetosdata
    </title>

    <link rel="icon" href="/img/logo-white.png">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <link rel="stylesheet" href="/argon/vendor/nucleo/css/nucleo.css" type="text/css">
    <link rel="stylesheet" href="/argon/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
    <link rel="stylesheet" href="/argon/css/argon.min.css" type="text/css">
    <link rel="stylesheet" href="/css/bootstrap-select.min.css" type="text/css">
    <link rel="stylesheet" href="/css/card-js.min.css" type="text/css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bs-stepper/dist/css/bs-stepper.min.css" type="text/css">
    {{-- <link rel="stylesheet" href="/css/bs-stepper.min.css" type="text/css"> --}}

    <style>

      .x-form-control .form-control-alternative
      {
          font-size: .875rem !important;
          font-weight: 400 !important;
          line-height: 1.5 !important;

          display: block !important;

          width: 100% !important;
          height: calc(1.5em + 1.25rem + 2px) !important;
          padding: .625rem .75rem !important;

          transition: all .15s cubic-bezier(.68, -.55, .265, 1.55) !important;

          color: #8898aa !important;
          border: 1px solid #dee2e6 !important;
          border-radius: .25rem !important;
          background-color: #fff !important;
          background-clip: padding-box !important;
          box-shadow: 0 3px 2px rgba(233, 236, 239, .05) !important;
      }
      @media (prefers-reduced-motion: reduce)
      {
          .x-form-control .form-control-alternative
          {
              transition: none !important;
          }
      }
      .x-form-control .form-control-alternative::-ms-expand
      {
          border: 0 !important;
          background-color: transparent !important;
      }
      .x-form-control .form-control-alternative:-moz-focusring
      {
          color: transparent !important;
          text-shadow: 0 0 0 #8898aa !important;
      }
      .x-form-control .form-control-alternative:focus
      {
          color: #8898aa !important;
          border-color: #5e72e4 !important;
          outline: 0 !important;
          background-color: #fff !important;
          box-shadow: 0 3px 9px rgba(50, 50, 9, 0), 3px 4px 8px rgba(94, 114, 228, .1) !important;
      }
      .x-form-control .form-control-alternative::-ms-input-placeholder
      {
          opacity: 1 !important;
          color: #adb5bd !important;
      }
      .x-form-control .form-control-alternative::placeholder
      {
          opacity: 1 !important;
          color: #adb5bd !important;
      }
      .x-form-control .form-control-alternative:disabled,
      .x-form-control .form-control-alternative[readonly]
      {
          opacity: 1 !important;
          background-color: #e9ecef !important;
      }

      select.x-form-control .form-control-alternative:focus::-ms-value
      {
          color: #8898aa !important;
          background-color: #fff !important;
      }

      .x-form-control .form-control-alternative
      {
          font-size: .875rem !important;

          height: calc(1.5em + 1.25rem + 5px) !important;

          transition: all .15s ease-in-out !important;
      }
      @media (prefers-reduced-motion: reduce)
      {
          .x-form-control .form-control-alternative
          {
              transition: none !important;
          }
      }
      .x-form-control .form-control-alternative:focus::-ms-input-placeholder
      {
          color: #adb5bd !important;
      }
      .x-form-control .form-control-alternative:focus::placeholder
      {
          color: #adb5bd !important;
      }

      .x-card
      {
          transition: box-shadow .15s ease !important;

          border: 0 !important;
          box-shadow: 0 1px 3px rgba(50, 50, 93, .15), 0 1px 0 rgba(0, 0, 0, .02) !important;
      }
      .x-card:focus
      {
          box-shadow: 0 4px 6px rgba(50, 50, 93, .11), 0 1px 3px rgba(0, 0, 0, .08) !important;
      }

      .card-js .icon {
        display: none !important;
      }

      .card-js .has-error input, .card-js .has-error input:focus {
        color: #F64B2F !important;
      }

      .bg-info-light {
        background: #7edeee;
      }

      .bg-info-lighter {
        background: #d4f9ff;
      }

      .bg-success-light {
        background: #56d59e;
      }

      .bg-success-lighter {
        background: #99ffd3;
      }

    </style>

</head>

<body class="bg-default">

  <div class="main-content">

    <!-- Header -->
    <div class="header bg-gradient-primary pt-3 pt-lg-3 pb-8 pb-lg-8">
      <div class="container">
        <div class="header-body text-center mb-3">
          <div class="row justify-content-center">
            <div class="col-lg-5 col-md-6">
              {{-- <img src="/img/logo.png" alt="" height="100"> --}}
              <h2 class="text-white">Welcome to Aetosdata</h2>
              <p class="text-lead text-light">Please fill in the form to register.</p>
            </div>
          </div>
        </div>
      </div>
      <div class="separator separator-bottom separator-skew zindex-100">
        <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
          <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
        </svg>
      </div>
    </div>

    <div class="container mt--8 pb-5">
      <div class="row">
        <div class="col-md-12">

          <div class="card">
            <div class="card-body">

              <div id="stepper" class="bs-stepper">
                <div class="bs-stepper-header" role="tablist">
                  <div class="step" data-target="#step-1">
                    <button type="button" class="step-trigger" role="tab" id="step-1-trigger" aria-controls="step-1" aria-selected="true">
                        <span class="bs-stepper-circle">1</span>
                        <span class="bs-stepper-label">Basic Info</span>
                    </button>
                  </div>
                  <div class="line"></div>
                  <div class="step" data-target="#step-2">
                    <button type="button" class="step-trigger" role="tab" id="step-2-trigger" aria-controls="step-2" aria-selected="false" disabled="disabled">
                        <span class="bs-stepper-circle">2</span>
                        <span class="bs-stepper-label">Address</span>
                    </button>
                  </div>
                  <div class="line"></div>
                  <div class="step" data-target="#step-3">
                    <button type="button" class="step-trigger" role="tab" id="step-3-trigger" aria-controls="step-3" aria-selected="false" disabled="disabled">
                      <span class="bs-stepper-circle">3</span>
                      <span class="bs-stepper-label">Card</span>
                    </button>
                  </div>
                  <div class="line"></div>
                  <div class="step" data-target="#step-4">
                    <button type="button" class="step-trigger" role="tab" id="step-4-trigger" aria-controls="step-4" aria-selected="false" disabled="disabled">
                      <span class="bs-stepper-circle">4</span>
                      <span class="bs-stepper-label">Choose a Plan</span>
                    </button>
                  </div>
                </div>

                <div class="bs-stepper-content">

                  <div id="step-1" class="content" role="tabpanel" aria-labelledby="step-1-trigger">

                    <div class="d-flex justify-content-center">
                      <div class="card col-md-6">
                        <div class="card-body">

                          <div class="form-group mb-3">
                            <div class="input-group input-group-alternative">
                              <input id="name" class="form-control form-control-alternative" placeholder="Full Name" type="text" name="fullname">
                            </div>
                          </div>

                          <div class="form-group mb-3">
                            <div class="input-group input-group-alternative">
                              <input id="phone" class="form-control form-control-alternative" placeholder="Phone Number" type="text" name="phone">
                            </div>
                          </div>

                          <div class="form-group mb-3">
                            <div class="input-group input-group-alternative">
                              <input id="email" class="form-control form-control-alternative" placeholder="Email" type="text" name="email">
                            </div>
                          </div>

                          <div class="form-group mb-3">
                            <div class="input-group input-group-alternative">
                              <input id="password" class="form-control form-control-alternative" placeholder="Password" type="password" name="password">
                            </div>
                          </div>

                          <div class="form-group mb-3">
                            <div class="input-group input-group-alternative">
                              <input id="confirm_password" class="form-control form-control-alternative" placeholder="Confirm Password" type="password" name="confirm_password">
                            </div>
                          </div>

                        </div>
                        <div class="card-footer text-center">
                          <button type="button" class="btn btn-primary" onclick="Step(1)">Next</button>
                        </div>
                      </div>
                    </div>

                  </div>

                  <div id="step-2" class="content" role="tabpanel" aria-labelledby="step-2-trigger">

                    <div class="d-flex justify-content-center">
                      <div class="card col-md-6">
                        <div class="card-body">

                          <div class="form-group mb-3">
                            <div class="input-group input-group-alternative">
                              <input id="address_1" class="form-control form-control-alternative" placeholder="Address" type="text" name="address_1">
                            </div>
                          </div>

                          <div class="form-group mb-3">
                            <div class="input-group input-group-alternative">
                              <input id="City" class="form-control form-control-alternative" placeholder="City" type="text" name="City">
                            </div>
                          </div>

                          <div class="form-group mb-3">
                            <div class="input-group input-group-alternative">
                              <input id="state" class="form-control form-control-alternative" placeholder="State" type="text" name="state">
                            </div>
                          </div>

                          <div class="form-group mb-3">
                            <div class="input-group input-group-alternative">
                              <input id="country" class="form-control form-control-alternative" placeholder="Country" type="text" name="country">
                            </div>
                          </div>

                          <div class="form-group mb-3">
                            <div class="input-group input-group-alternative">
                              <input id="zip" class="form-control form-control-alternative" placeholder="Zip" type="tel" name="zip">
                            </div>
                          </div>

                        </div>
                        <div class="card-footer text-center">
                          <button type="submit" class="btn btn-primary" onclick="Back()">Back</button>
                          <button type="submit" class="btn btn-primary" onclick="Step(2)">Next</button>
                        </div>
                      </div>
                    </div>

                  </div>

                  <div id="step-3" class="content" role="tabpanel" aria-labelledby="step-3-trigger">

                    <div class="d-flex justify-content-center">
                      <div class="card col-md-6">
                        <div class="card-body">

                          <div id="card-reader" class="card-js">
                            <input class="card-number x-form-control form-control-alternative x-card" placeholder="Card Number" name="card-number">
                            <input class="name x-form-control form-control-alternative x-card" id="the-card-name-id" name="card-holders-name" placeholder="Name on Card">
                            <input class="expiry-month x-form-control form-control-alternative x-card" name="expiry-month" onchange="OnChange(this)">
                            <input class="expiry-year x-form-control form-control-alternative x-card" name="expiry-year" onchange="OnChange(this)">
                            <input class="cvc x-form-control form-control-alternative x-card" name="cvc" onchange="OnChange(this)">
                          </div>

                        </div>
                        <div class="card-footer text-center">
                          <button type="submit" class="btn btn-primary" onclick="Back()">Back</button>
                          <button type="submit" class="btn btn-primary" onclick="Step(2)">Next</button>
                        </div>
                      </div>
                    </div>

                  </div>

                  <div id="step-4" class="content" role="tabpanel" aria-labelledby="step-4-trigger">

                    <div class="container">

                        <div class="row align-items-center">
                            <div class="col">
                                <div class="card bg-info">
                                    <div class="card-body px-1 text-center">
                                        <h1 class="display-3 text-white py-3">START</h1>
                                        <span class="badge badge-default px-3"><h3 class="text-white m-0 p-0">$179/month</h3></span>
                                        <div class="container bg-info-lighter mt--3 px-0 py-5">

                                            <h3 class="pt-1 pb-4">MOST POPULAR</h3>

                                            <p class="text-small py-2 m-0 bg-info-light">Up to 3 team members</p>
                                            <p class="text-small py-2 m-0">Unlimited storage</p>
                                            <p class="text-small py-2 m-0 bg-info-light">Unlimited Affiliates & Leads</p>
                                            <p class="text-small py-2 m-0">Private Label Client Portal</p>
                                            <p class="text-small py-2 m-0 bg-info-light">Up to 300 active clients</p>
                                            <p class="text-small py-2 m-0">All our core features</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bg-success">
                                    <div class="card-body px-1 text-center">
                                        <h1 class="display-3 text-white py-3">GROW</h1>
                                        <span class="badge badge-light px-3"><h3 class="m-0 p-0">$299/month</h3></span>

                                        <div class="container bg-success-lighter mt--3 px-0 pb-5 pt-3">
                                            <h6 class="pt-1 pb-3 m-0">FOR SMALL TEAMS</h6>
                                            <p class="text-small py-2 m-0 bg-success-light">Up to 6 team members</p>
                                            <p class="text-small py-2 m-0">Unlimited storage</p>
                                            <p class="text-small py-2 m-0 bg-success-light">Unlimited Affiliates & Leads</p>
                                            <p class="text-small py-2 m-0">Private Label Client Portal</p>
                                            <p class="text-small py-2 m-0 bg-success-light">Up to 600 active clients</p>
                                            <p class="text-small py-2 m-0">All our core features</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bg-success">
                                    <div class="card-body px-1 text-center">
                                        <h1 class="display-3 text-white py-3">SCALE</h1>
                                        <span class="badge badge-light px-3"><h3 class="m-0 p-0">$399/month</h3></span>
                                        <div class="container bg-success-lighter mt--3 px-0 pb-5 pt-3">
                                            <h6 class="pt-1 pb-3 m-0">FOR MEDIUM TEAMS</h6>
                                            <p class="text-small py-2 m-0 bg-success-light">Up to 12 team members</p>
                                            <p class="text-small py-2 m-0">Unlimited storage</p>
                                            <p class="text-small py-2 m-0 bg-success-light">Unlimited Affiliates & Leads</p>
                                            <p class="text-small py-2 m-0">Private Label Client Portal</p>
                                            <p class="text-small py-2 m-0 bg-success-light">Up to 1200 active clients</p>
                                            <p class="text-small py-2 m-0">All our core features</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bg-success">
                                    <div class="card-body px-1 text-center">
                                        <h1 class="display-3 text-white py-3">ENTERPRISE</h1>
                                        <span class="badge badge-light px-3"><h3 class="m-0 p-0">$599/month</h3></span>
                                        <div class="container bg-success-lighter mt--3 px-0 pb-5 pt-3">
                                            <h6 class="pt-1 pb-3 m-0">FOR POWER USERS</h6>
                                            <p class="text-small py-2 m-0 bg-success-light">Up to 24 team members</p>
                                            <p class="text-small py-2 m-0">Unlimited storage</p>
                                            <p class="text-small py-2 m-0 bg-success-light">Unlimited Affiliates & Leads</p>
                                            <p class="text-small py-2 m-0">Private Label Client Portal</p>
                                            <p class="text-small py-2 m-0 bg-success-light">Up to 2400 active clients</p>
                                            <p class="text-small py-2 m-0">All our core features</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col text-center">
                                <button type="submit" class="btn btn-primary" onclick="Back()">Back</button>
                                <button type="submit" class="btn btn-primary" onclick="Step(2)">Proceed</button>
                            </div>
                        </div>
                    </div>

                  </div>

                </div>

              </div>
            </div>
            <div class="card-footer">
              <a href="/signin" class="small float-right">Sign In</a>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

  <!--   Core   -->
  <script src="/argon/assets/js/plugins/jquery/dist/jquery.min.js"></script>
  <script src="/argon/assets/js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <!--   Argon JS   -->
  <script src="/argon/assets/js/argon-dashboard.min.js?v=1.1.0"></script>
  {{-- Custom JS --}}
  <script src="/js/core.js"></script>
  {{-- Card JS --}}
  <script src="/js/card-js.min.js"></script>
  {{-- Stepper JS --}}
  <script src="https://cdn.jsdelivr.net/npm/bs-stepper/dist/js/bs-stepper.min.js"></script>
  {{-- <script src="/js/bs-stepper.min.js"></script> --}}

  <script>

    var stepper = new Stepper($('.bs-stepper')[0])

    var Back = function() {
      stepper.previous()
    }
    var Step = function(step) {

      switch (step) {
        case 1:
          stepper.next()
          break;

        case 2:
          stepper.next()
          break;

        case 3:
          stepper.next()
          break;

        case 4:
          stepper.next()
          break;

        default:
          break;
      }

    }

    var OnChange = function(el) {

      console.log(el)


    }

    $(document).ready(function() {
      var expiry = document.getElementsByClassName('expiry')[0]
      expiry.setAttribute('id', 'expiry')
      expiry.setAttribute('class', 'expiry x-form-control form-control-alternative x-card')
      expiry.setAttribute('oninput', 'OnChange(this)')
    })


  </script>

</body>

</html>
