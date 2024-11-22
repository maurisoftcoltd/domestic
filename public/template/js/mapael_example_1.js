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
                                max: 10,
                                attrs: {
                                    fill: "#89ff72",
                                },
                                label: "< 10",
                            },
                            {
                                size: 15,
                                type: "circle",
                                min: 10,
                                max: 50,
                                attrs: {
                                    fill: "#fffd72",
                                },
                                label: "10 - 50",
                            },
                            {
                                size: 20,
                                type: "circle",
                                min: 50,
                                max: 100,
                                attrs: {
                                    fill: "#ffbd54",
                                },
                                label: "50 - 100",
                            },
                            {
                                size: 25,
                                type: "circle",
                                min: 100,
                                attrs: {
                                    fill: "#ff5454",
                                },
                                label: "100+",
                            },
                        ],
                    },
                },
                plots: data
            });
        }
    });

});
