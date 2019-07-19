

var config = {
    //  map: {
    //     '*': {
           
    //     }
    // },

    paths: {
           waypoints:'js/waypoints',counter:'js/counterup', fancybox: 'js/fancybox', sumoselect: 'js/sumoselect'
        },

    shim: {
        'fancybox': {
            deps: ['jquery']
         },
        'counter': {
            deps: ['jquery']
        },
        'waypoints': {
            deps: ['jquery']
        },
        'sumoselect': {
            deps: ['jquery']
        },
    },
     deps: [
    "js/main",
  ],
};
