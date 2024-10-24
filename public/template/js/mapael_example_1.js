$(function () {
    "use strict";

    let plotData = $.get($(".mapael-example-1").data('url'), function(data) {
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
                                max: 20000,
                                attrs: {
                                    fill: "#89ff72",
                                },
                                label: "< 20,000",
                            },
                            {
                                size: 15,
                                type: "circle",
                                min: 20000,
                                max: 100000,
                                attrs: {
                                    fill: "#fffd72",
                                },
                                label: "20,000 - 100,000",
                            },
                            {
                                size: 20,
                                type: "circle",
                                min: 100000,
                                max: 200000,
                                attrs: {
                                    fill: "#ffbd54",
                                },
                                label: "100,000 - 200,000",
                            },
                            {
                                size: 25,
                                type: "circle",
                                min: 200000,
                                attrs: {
                                    fill: "#ff5454",
                                },
                                label: "200,000+",
                            },
                        ],
                    },
                },
                plots: data
            });
        }
    });

});
