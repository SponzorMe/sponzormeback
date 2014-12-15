//PARAMETROS DE LA API DE YAHOO
var ApyKey="39i.f0DV34GOlH0sVKIe41bE0Gq5xf_5fNxUOawoHc24DVMSw7gGfjURibF_5guxgA--";
var ApyUrl="http://where.yahooapis.com/v1/";
$(document).on("ready",function (){
  getCountries();
  $(document).on('change','#country',function()
    {
      country=$("#country").val();
      $("#city").html("");
      getStatesByCountry(country);
    });

  $(document).on('change','#state',function()
    {
      state=$("#state").val();
      getCitiesbyState(state);
    });
});

//FUNCTION QUE ORDENA UN ARRAY JSON ALFABETICAMENTE
function SortByName(x,y) 
{
   return ((x.name == y.name) ? 0 : ((x.name > y.name) ? 1 : -1 ));
}
function getCountries() 
{
   $("#country").html("");
  $("#country").append('<option value="">Choose State</option>');
  var url=ApyUrl+"countries?format=json&view=short&appid="+ApyKey;
    $.get(url, {type: "JSON", lang: "en-US"}, function(data) 
    {
      var countries=data.places.place;
      countries.sort(SortByName);
      for (var i = 0; i < data.places.place.length; i++) 
      {
        $("#country").append('<option value="'+countries[i].name+'">'+countries[i].name+'</option>');
      }
  });
}
function getStatesByCountry(country)
{
  $("#state").html("");
  $("#state").append('<option value="">Choose State</option>');
  var url=ApyUrl+"states/"+country+"?format=json&view=short&appid="+ApyKey;
  $.get(url, {type: "JSON", lang: "en-US"}, function(data) 
    {
      var states=data.places.place;
      states.sort(SortByName);
      for (var i = 0; i < data.places.place.length; i++) 
      {
      
        $("#state").append('<option value="'+states[i].name+'">'+states[i].name+'</option>');
      }
  });
}
function getCitiesbyState(state)
{
  $("#city").html("");
  $("#city").append('<option value="">Choose City</option>');
  var url=ApyUrl+"counties/"+state+"?format=json&view=short&appid="+ApyKey;
  $.get(url, {type: "JSON", lang: "en-US"}, function(data) 
    {
      var cities=data.places.place;
      cities.sort(SortByName);
      for (var i = 0; i < data.places.place.length; i++) 
      {
        $("#city").append('<option value="'+cities[i].name+'">'+cities[i].name+'</option>');
      }
  });
}