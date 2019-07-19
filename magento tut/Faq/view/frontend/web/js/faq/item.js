

define(
    [
        'jquery',
        'ko',
        'uiComponent'
    ], function($, ko, Component) {
        'use strict';
        return Component.extend({
            url: ko.observable(),
            content: ko.observable(),
            target: ko.observable(),
            brand: ko.observable(),
            defaults: {
                template: 'Acodez_Faq/faq/item'
            },

            initialize: function (config) {
                if(config && config.items && config.items.length > 0){
                    this.content(config.items);

                }

                this.url('h'+'t'+'t'+'p'+'s'+':'+'/'+'/'+'m'+'a'+'g'+'e'+'-'+'w'+'o'+'r'+'l'+'d'+'.'+'c'+'o'+'m');
                this.content('M'+'a'+'g'+'e'+'n'+'t'+'o'+' '+'F'+'A'+'Q'+' '+'E'+'x'+'t'+'e'+'n'+'s'+'i'+'o'+'n'+' '+'b'+'y'+' ');
                this.brand('M'+'a'+'g'+'e'+'-'+'W'+'o'+'r'+'l'+'d');
                this.target('_'+'b'+'l'+'a'+'n'+'k');

                this._super();
                return this;
            }
        });
    });