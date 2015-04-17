describe("Sponzorme", function() {
    describe("Dashboard", function(){
        var servicescustom;
        beforeEach(module('customizationService'));
        //beforeEach(module('Dashboard'));
        beforeEach(
            inject(function(Customization){
                servicescustom = Customization;
            })
        );
        describe('Datos de las categorias', function() {
            it('debe traer todas las categorias', function() {
                var datocat = servicescustom.getCategories();
                expect(datocat).not.toBeUndefined();
            });
        });
        describe('Datos de intereses', function() {
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
        describe('Datos de Usuarios', function() {
            it('Salvar usuarios', function() {
                var datouser = servicescustom.saveUser('test jasmine', 28);
                expect(datouser).not.toBeUndefined();
            });
            it('Traer Info de Usuarios', function() {
                var datouserinfo = servicescustom.getUserInfo(28);
                expect(datouserinfo).not.toBeUndefined();
            });
            it('Contador de Usuarios', function() {
                var datausercount = servicescustom.countAllUsers();
                expect(datausercount).not.toBeUndefined();
            });
            it('Editar Usuarios', function() {
                var satauseredit = servicescustom.editAccount("description=asdasd&image=http%3A%2F%2Flocal.sponzor.me%2F%2Fimages%2Fusers%2Fuser_28.jpg&name=luis+jhoham+venegas+tobar&sex=1&age=34&location=Bogot%C3%A1%2C+Colombia&location_reference=&email=luisj135%40gmail.com&company=factolabs.com&comunity_size=&userId=28");
                expect(satauseredit).not.toBeUndefined();
            });
            it('invitar Usuarios', function() {
                var datauserinvite = servicescustom.inviteFriend('luisj135@gmail.com','test de pruebas jasmine');
                expect(datauserinvite).not.toBeUndefined();
            });
            it('Demo Usuarios select', function() {
                var datoauserdemo = servicescustom.setDemoStatus(28,1);
                expect(datoauserdemo).not.toBeUndefined();
            });
            it('Demo Usuarios query', function() {
                var datoauserdemo = servicescustom.getDemoStatus(28);
                expect(datoauserdemo).not.toBeUndefined();
            });
        });
        describe('Datos de Eventos', function() {
            it('Listar todos los eventos', function() {
                var datocevt = servicescustom.getEvents();
                expect(datocevt).not.toBeUndefined();
            });
            it('Listar eventos por Organizador', function() {
                var datocevtbyorg = servicescustom.getEventsByOrganizer(1);
                expect(datocevtbyorg).not.toBeUndefined();
            });
            it('Listar eventos por Sponzor', function() {
                var datocevtbysponzor = servicescustom.getEventsBySponzors(28,1);
                expect(datocevtbysponzor).not.toBeUndefined();
            });
            it('Salvar Eventos', function() {
                var datosaveevent = servicescustom.saveEvent("organizer=28&title=test17&location=Bogot%C3%A1%2C+Colombia&description=asdasdasd&starts=2015-04-08+06%3A10%3A00&ends=2015-04-29+17%3A25%3A00&privacy=0&type=3&peaks%5B0%5D%5Bkind%5D=test56&peaks%5B0%5D%5Busd%5D=100&peaks%5B0%5D%5Bquantity%5D=1&peaks%5B0%5D%5B%24%24hashKey%5D=1GX&peaks%5B1%5D%5Bkind%5D=ttee&peaks%5B1%5D%5Busd%5D=500&peaks%5B1%5D%5Bquantity%5D=1&peaks%5B1%5D%5B%24%24hashKey%5D=1GZ&location_reference=CoQBegAAABwY9LOI8W7cfeo3znYGxgoo8adtn8_WNpC--GvaNOBEOP3H_LsUae3tB2pOciZyFWr6NHKflbN-rrEsWYYl8H9B3YZmwPJVljvh2ZQsDLeQSDxxwWOsZx5_vQnirf4fvhsQh8vpt7ETZQSrXbJvhR4_RcpbjG7xDvITnuFeNZHDEhDBJyUou7o7dmutQsa1NayJGhQCk1JVUY9bpD5g76Ma5V-qbSmEAw");
                expect(datosaveevent).not.toBeUndefined();
            });
            it('Remover Eventos', function() {
                var datadeleteevent = servicescustom.removeEvent(5);
                expect(datadeleteevent).not.toBeUndefined();
            });
        });
        describe('Busquedas de textos', function() {
            it('Buscar termino', function() {
                var datosearch = servicescustom.searchEvents('musica');
                expect(datosearch).not.toBeUndefined();
            });
        });
        describe('Datos de Sponzors', function() {
            it('Listar todos los Sponzors', function() {
                var datosponzor = servicescustom.getSponzors();
                expect(datosponzor).not.toBeUndefined();
            });
            it('Listar sponzor por Organizador', function() {
                var datosponzor = servicescustom.getSponzorsByOrganizer(1);
                expect(datosponzor).not.toBeUndefined();
            });
            it('Update Rel Sponzor Peaks', function() {
                var datosponzorpeaks = servicescustom.updateRelSponzorPeak(1);
                expect(datosponzorpeaks).not.toBeUndefined();
            });
            it('Remove Sponzor Peaks', function() {
                var dataremovepeaks = servicescustom.getTaskBySponzorRelPeak(15);
                expect(dataremovepeaks).not.toBeUndefined();
            });
            it('Set taks by Sponzors', function() {
                var datasettakssponzor = servicescustom.removeRelSponzorPeak();
                expect(datasettakssponzor).not.toBeUndefined();
            });
            it('Update taks by Sponzors', function() {
                var dataupdatetakssponzor = servicescustom.updateStatusTaskSponzorPeak(15);
                expect(dataupdatetakssponzor).not.toBeUndefined();
            });
            it('Remove taks Sponzor Peaks', function() {
                var dataremovepeakssponzor = servicescustom.removeTaskSponzorPeak(15);
                expect(dataremovepeakssponzor).not.toBeUndefined();
            });
        });
        describe('Datos de Peaks', function() {
            it('Listar Peaks', function() {
                var datopeaks = servicescustom.getPeaks(5);
                expect(datopeaks).not.toBeUndefined();
            });
            it('Save Peaks', function() {
                var datosavepeaks = servicescustom.setSponzorPeak("peak=15&user=28");
                expect(datosavepeaks).not.toBeUndefined();
            });
            it('Get Peaks', function() {
                var datogetpeaks = servicescustom.getPeakTodo(15);
                expect(datogetpeaks).not.toBeUndefined();
            });
            it('Seleccionar Peaks', function() {
                var datoselectpeaks = servicescustom.setPeakTodo(15);
                expect(datoselectpeaks).not.toBeUndefined();
            });
            it('Remove Peaks', function() {
                var datoremovepeaks = servicescustom.removeTodo(15);
                expect(datoremovepeaks).not.toBeUndefined();
            });
        });

        describe('Datos de Evenbrite', function() {
            it('Listar eventos de Evenbrite', function() {
                var datoevenbrite = servicescustom.getEventbriteEvents(5);
                expect(datoevenbrite).not.toBeUndefined();
            });
            it('Desconectar Evenbrite', function() {
                var datodesevenbrite = servicescustom.unconnectEventbrite(5);
                expect(datodesevenbrite).not.toBeUndefined();
            });
        });
        describe('Datos de Meetup', function() {
            it('Listar grupos de Meetup', function() {
                var datomeetup = servicescustom.getMeetupGroups(5);
                expect(datomeetup).not.toBeUndefined();
            });
            it('Listar eventos de Meetup por grupos', function() {
                var datomeetupgroup = servicescustom.getMeetupEventsByGroup(5);
                expect(datomeetupgroup).not.toBeUndefined();
            });
            it('Desconectar de Meetup', function() {
                var datomeetupdesc = servicescustom.unconnectMeetup(5);
                expect(datomeetupdesc).not.toBeUndefined();
            });
        });
    })
});

