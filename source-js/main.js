jQuery(document).ready(function () {

  jQuery('.fa-search').on('click', function (event) {
    jQuery('.search-input').toggleClass('show')
    event.preventDefault()
  })

})



