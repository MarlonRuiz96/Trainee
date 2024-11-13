define([], function () {
    'use strict';
//Prueba
    return function (Provider) {
        return Provider.extend({
            setData: function (data) {
                console.log('Iniciando setData');
                console.trace('Traza de ejecución de setData');  // Traza de ejecución
                let result = this._super(data);
                console.log('Finalizando setData');
                console.log('Datos enviados (después del super):', JSON.parse(JSON.stringify(data)));

                return result;
            }
        });
    };
});
