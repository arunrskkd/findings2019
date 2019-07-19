
define(
    [
        'jquery',
        'ko',
        'uiComponent'
    ], function($, ko, Component) {
        'use strict';
        return Component.extend({
            items: ko.observableArray([]),
            allItems: ko.observableArray([]),
            defaults: {
                template: 'Acodez_Faq/faq/grid'
            },

            initialize: function (config) {
                if(config && config.items && config.items.length > 0){
                    this.items(config.items);
                    this.allItems(config.items);

                }

                this._super();
                return this;
            },
            
            setItems: function (data) {
                if(data && data.length > 0){
                    this.items(data);
                }
                else{
                    this.items([]);
                }
            },

            showAnswer: function(item, event){
                $(event.target).toggleClass('expanse');
                var parent = $(event.target).parent();
                $(parent).find('.faq-item-answer').slideToggle('');
            }
        });
    });