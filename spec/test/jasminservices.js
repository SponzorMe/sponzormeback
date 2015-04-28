//Interesting things to test the Auth service for

// Logging in with Facebook
// Handling callback to server for checkuser
// Saving user to localstorage after login
// Logging out (removing user object as well as localstorage)

"use strict";

describe("Testing Spopnzor.me Services", function() {
    var value, servicescustom;

    beforeEach(function(done) {
        setTimeout(function() {
          value = 0;
          done();
        }, 1);
      });

    beforeEach(function() {
        module('customizationService');
        inject(function(_Customization_){
                servicescustom = _Customization_;
            });
      });

    it("Call Categories", function() {
        var datocat = servicescustom.getCategories();
        expect(datocat).not.toBeUndefined();
    });

    it('debe traer todos los intereses', function() {
        var datoint = servicescustom.getInterests();
        expect(datoint).not.toBeUndefined();
    });
    it('debe traer todos los intereses por categorias', function() {
        var datocint = servicescustom.getInterestsByCategories(1);
        expect(datocint).not.toBeUndefined();
    });
    it('Salvar Intereses', function() {
        var datocintsave = servicescustom.saveInterests('Musica', 12);
        expect(datocintsave).not.toBeUndefined();
    });

});
