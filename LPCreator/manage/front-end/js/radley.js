/**
 * Created by Radley on 6/1/2016.
 */


$(function() {
    var selectStores = $( "#storesOperated" );
    var slider = $( "<div class='rad-slider'></div>" ).insertAfter( selectStores ).slider({
        min: 1,
        max: 4,
        range: "min",
        value: selectStores[ 0 ].selectedIndex + 1,
        slide: function( event, ui ) {
            selectStores[ 0 ].selectedIndex = ui.value - 1;
        }
    });
    $( "#storesOperated" ).change(function() {
        slider.slider( "value", this.selectedIndex + 1 );
    });

    var selectCupSize = $( "#cupSize" );
    var sliderCupSize = $( "<div class='rad-slider'></div>" ).insertAfter( selectCupSize ).slider({
        min: 1,
        max: 12,
        range: "min",
        value: selectCupSize[ 0 ].selectedIndex + 1,
        slide: function( event, ui ) {
            selectCupSize[ 0 ].selectedIndex = ui.value - 1;
        }
    });
    $( "#cupSize" ).change(function() {
        sliderCupSize.slider( "value", this.selectedIndex + 1 );
    });

    var selectCupType = $( "#cupType" );
    var sliderCupType = $( "<div class='rad-slider'></div>" ).insertAfter( selectCupType ).slider({
        min: 1,
        max: 8,
        range: "min",
        value: selectCupType[ 0 ].selectedIndex + 1,
        slide: function( event, ui ) {
            selectCupType[ 0 ].selectedIndex = ui.value - 1;
        }
    });
    $( "#cupType" ).change(function() {
        sliderCupType.slider( "value", this.selectedIndex + 1 );
    });


    var selectAnnualUsage = $( "#annualUsage" );
    var sliderAnnualUsage = $( "<div class='rad-slider'></div>" ).insertAfter( selectAnnualUsage ).slider({
        min: 1,
        max: 5,
        range: "min",
        value: selectAnnualUsage[ 0 ].selectedIndex + 1,
        slide: function( event, ui ) {
            selectAnnualUsage[ 0 ].selectedIndex = ui.value - 1;
        }
    });
    $( "#annualUsage" ).change(function() {
        sliderAnnualUsage.slider( "value", this.selectedIndex + 1 );
    });

    var selectDeliveryDate = $( "#expectedDelivery" );
    var sliderDeliveryDate = $( "<div class='rad-slider'></div>" ).insertAfter( selectDeliveryDate ).slider({
        min: 1,
        max: 4,
        range: "min",
        value: selectDeliveryDate[ 0 ].selectedIndex + 1,
        slide: function( event, ui ) {
            selectDeliveryDate[ 0 ].selectedIndex = ui.value - 1;
        }
    });
    $( "#expectedDelivery" ).change(function() {
        sliderDeliveryDate.slider( "value", this.selectedIndex + 1 );
    });

    

});

