$(function () {
    "use strict";

    let plotData = $.get($(".mapael-example-1").data('url'), function(data) {
        console.log(data);
        if ($(".mapael-example-1").length) {
            $(".mapael-example-1").mapael({
                map: {
                    name: "france_departments",
                    defaultArea: {
                        attrsHover: {
                            fill: "#343434",
                            stroke: "#5d5d5d",
                            "stroke-width": 1,
                            "stroke-linejoin": "round",
                        },
                    },
                },
                legend: {
                    plot: {
                        cssClass: "myLegend",
                        mode: "horizontal",
                        labelAttrs: {
                            fill: "#4a4a4a",
                        },
                        titleAttrs: {
                            fill: "#4a4a4a",
                        },
                        marginBottom: 20,
                        marginLeft: 10,
                        hideElemsOnClick: {
                            opacity: 0,
                        },
                        title: "Trinidad Domestic Abuse Reports By City",
                        slices: [
                            {
                                size: 5,
                                type: "circle",
                                max: data.days*.1,
                                attrs: {
                                    fill: "#89ff72",
                                },
                                label: "< " + Math.round(data.days*.1),
                            },
                            {
                                size: 15,
                                type: "circle",
                                min: data.days*.1,
                                max: data.days*.5,
                                attrs: {
                                    fill: "#fffd72",
                                },
                                label: Math.round(data.days*.1) +' - '+ Math.round(data.days*.5),
                            },
                            {
                                size: 20,
                                type: "circle",
                                min: data.days*.5,
                                max: data.days*1,
                                attrs: {
                                    fill: "#ffbd54",
                                },
                                label: Math.round(data.days*.5) +' - '+ Math.round(data.days*1),
                            },
                            {
                                size: 25,
                                type: "circle",
                                min: data.days*1,
                                attrs: {
                                    fill: "#ff5454",
                                },
                                label: Math.round(data.days*1) +'+',
                            },
                        ],
                    },
                },
                plots: data.points
            });
        }
    });

});
