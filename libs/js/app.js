function loadStates(countryId) {
    if (countryId) {
      fetch('get_states.php?country_id=' + countryId)
        .then(response => response.json())
        .then(data => {
          let stateSelect = document.querySelector('.form-select.state');
          stateSelect.innerHTML = '<option value="" selected>Select State</option>';
          data.forEach(state => {
            stateSelect.innerHTML += `<option value="${state.id}">${state.name}</option>`;
          });
        });
    } else {
      document.querySelector('.form-select.state').innerHTML = '<option value="" selected>Select State</option>';
      document.querySelector('.form-select.city').innerHTML = '<option value="" selected>Select City</option>';
    }
  }

  function loadCities(stateId) {
    if (stateId) {
      fetch('get_cities.php?state_id=' + stateId)
        .then(response => response.json())
        .then(data => {
          let citySelect = document.querySelector('.form-select.city');
          citySelect.innerHTML = '<option value="" selected>Select City</option>';
          data.forEach(city => {
            citySelect.innerHTML += `<option value="${city.id}">${city.name}</option>`;
          });
        });
    } else {
      document.querySelector('.form-select.city').innerHTML = '<option value="" selected>Select City</option>';
    }
  }