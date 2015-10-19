L.Polyline.Measure = L.Draw.Polyline.extend({

    options: {

     shapeOptions: {
        stroke: true,
        color: 'gold',
        weight: 2,
        opacity: 0.5,
        fill: true,
        clickable: true
    }
},

addHooks: function() {
    L.Draw.Polyline.prototype.addHooks.call(this);
    if (this._map) {
        this._markerGroup = new L.LayerGroup();
        this._map.addLayer(this._markerGroup);

        this._markers = [];
        this._map.on('click', this._onClick, this);
        this._startShape();
    }
},

removeHooks: function () {
    L.Draw.Polyline.prototype.removeHooks.call(this);
/*
        this._clearHideErrorTimeout();

        //!\ Still useful when control is disabled before any drawing (refactor needed?)
        this._map.off('mousemove', this._onMouseMove);
        this._clearGuides();

        this._removeShape();
        */


        if (this._map) {

            this._container.style.cursor = '';

            this._map.off('click', this._onClick, this);
            this._map.off('mousemove', this._onMouseMove, this);
            this._map.off('viewreset', this._keepTooltipPos , this);

        }

    },

    _startShape: function() {
        this._drawing = true;
        this._poly = new L.Polyline([], this.options.shapeOptions);

        this._container.style.cursor = 'crosshair';

        this._updateTooltip();
        this._map.on('mousemove', this._onMouseMove, this);
    },

    _finishShape: function () {

        this._drawing = false;

        this._cleanUpShape();
        this._clearGuides();


        this._updateTooltip();

        // aby zĹŻstal tooltip na stejnĂˇch coordinates i po zoomovani
        var tooltipContainer = this._tooltip._container;
        tooltipContainer._latlng = this._map.layerPointToLatLng(this._tooltip._container._leaflet_pos);

        this._map.on('viewreset', this._keepTooltipPos , this);




        this._map.off('mousemove', this._onMouseMove, this);
        this._container.style.cursor = '';


    },


    _keepTooltipPos: function() {
                 var pos = this._map.latLngToLayerPoint(this._tooltip._container._latlng);
                 L.DomUtil.setPosition(this._tooltip._container, pos);
            },


    _removeShape: function() {
        if (!this._poly)
            return;
        this._map.removeLayer(this._poly);
        delete this._poly;
        this._markers.splice(0);
        this._markerGroup.clearLayers();

    },

    _onClick: function(e) {
        if (!this._drawing) {
            this._removeShape();
            this._startShape();
            return;
        }


        L.Draw.Polyline.prototype._onClick.call(this, e);

        var latlngs = this._poly.getLatLngs();
        this._area = L.GeometryUtil.geodesicArea(latlngs);
        this._readableArea = L.GeometryUtil.readableArea(this._area, true);





    },

    _getTooltipText: function() {
        var labelText = L.Draw.Polyline.prototype._getTooltipText.call(this);
        if (!this._drawing) {
            labelText.text = '';
        }

        if (this._markers.length > 3) {
            labelText.subtext += '; ' + this._readableArea;
        }

        return labelText;
    }
});

L.Control.MeasureControl = L.Control.extend({

    statics: {
        TITLE: 'Měření'
    },
    options: {
        position: 'topright',
        handler: {}
    },

    toggle: function() {
        if (this.handler.enabled()) {
            this.handler.disable.call(this.handler);
            this.Measure_toggler = false;
        } else {
            this.handler.enable.call(this.handler);
            if(this.CUZK_toggler==true){
                this.CUZKControl.disable();
            }
            this.Measure_toggler = true;
        }
    },

    onAdd: function(map) {
        var className = 'leaflet-control-draw';

        this._container = L.DomUtil.create('div', 'leaflet-bar');

        this.handler = new L.Polyline.Measure(map, this.options.handler);

        this.handler.on('enabled', function () {
            L.DomUtil.addClass(this._container, 'enabled');
        }, this);

        this.handler.on('disabled', function () {
            L.DomUtil.removeClass(this._container, 'enabled');
        }, this);

        var link = L.DomUtil.create('a', className+'-measure', this._container);
        link.href = '#';
        link.title = L.Control.MeasureControl.TITLE;


        L.DomEvent
        .addListener(link, 'click', L.DomEvent.stopPropagation)
        .addListener(link, 'click', L.DomEvent.preventDefault)
        .addListener(link, 'click', this.toggle, this);

        return this._container;
    }
});


L.Map.mergeOptions({
    measureControl: false
});


// L.Map.addInitHook(function () {
//     if (this.options.measureControl) {
//         this.measureControl = L.Control.measureControl().addTo(this);
//     }
// });


L.Control.measureControl = function (options) {
    return new L.Control.MeasureControl(options);
};

