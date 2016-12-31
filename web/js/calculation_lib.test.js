var assert = require('assert'),
  jsdom = require('jsdom');

var document = jsdom.jsdom("");
var window = document.defaultView;
global.window = window
$ = require('jquery');


calcModule = require('./calculation_lib.js')


describe('Array', function() {

  describe('#calcBrandflaeche()', function() {
    it('should return 2000', function() {
      assert.equal(2000, calcModule.calcBrandflaeche(6000, [0,0,1,0,0]));
      assert.equal(2000, calcModule.calcBrandflaeche(6000, [0,1,1,0,0]));
      assert.equal(2000, calcModule.calcBrandflaeche(6000, [1,0,1,0,0]));
      assert.equal(2000, calcModule.calcBrandflaeche(6000, [1,1,1,0,0]));
    });
    it('should return 1200', function() {
      assert.equal(1200, calcModule.calcBrandflaeche(6000, [0,0,0,1,0]));
      assert.equal(1200, calcModule.calcBrandflaeche(6000, [0,0,1,1,0]));
      assert.equal(1200, calcModule.calcBrandflaeche(6000, [0,1,0,1,0]));
      assert.equal(1200, calcModule.calcBrandflaeche(6000, [0,1,1,1,0]));
      assert.equal(1200, calcModule.calcBrandflaeche(6000, [1,0,0,1,0]));
      assert.equal(1200, calcModule.calcBrandflaeche(6000, [1,0,1,1,0]));
      assert.equal(1200, calcModule.calcBrandflaeche(6000, [1,1,0,1,0]));
      assert.equal(1200, calcModule.calcBrandflaeche(6000, [1,1,1,1,0]));
    });
    it('should return 750', function() {
      assert.equal(750, calcModule.calcBrandflaeche(6000, [0,0,0,0,1]));
      assert.equal(750, calcModule.calcBrandflaeche(6000, [0,0,0,1,1]));
      assert.equal(750, calcModule.calcBrandflaeche(6000, [0,0,1,0,1]));
      assert.equal(750, calcModule.calcBrandflaeche(6000, [0,0,1,1,1]));
      assert.equal(750, calcModule.calcBrandflaeche(6000, [0,1,0,0,1]));
      assert.equal(750, calcModule.calcBrandflaeche(6000, [0,1,0,1,1]));
      assert.equal(750, calcModule.calcBrandflaeche(6000, [0,1,1,0,1]));
      assert.equal(750, calcModule.calcBrandflaeche(6000, [0,1,1,1,1]));
      assert.equal(750, calcModule.calcBrandflaeche(6000, [1,0,0,0,1]));
      assert.equal(750, calcModule.calcBrandflaeche(6000, [1,0,0,1,1]));
      assert.equal(750, calcModule.calcBrandflaeche(6000, [1,0,1,0,1]));
      assert.equal(750, calcModule.calcBrandflaeche(6000, [1,0,1,1,1]));
      assert.equal(750, calcModule.calcBrandflaeche(6000, [1,1,0,0,1]));
      assert.equal(750, calcModule.calcBrandflaeche(6000, [1,1,0,1,1]));
      assert.equal(750, calcModule.calcBrandflaeche(6000, [1,1,1,0,1]));
      assert.equal(750, calcModule.calcBrandflaeche(6000, [1,1,1,1,1]));
    });
    it('should return 10', function() {
      assert.equal(10, calcModule.calcBrandflaeche(10, [0,0,0,0,0]));
      assert.equal(10, calcModule.calcBrandflaeche(10, [0,0,0,0,1]));
      assert.equal(10, calcModule.calcBrandflaeche(10, [0,0,0,1,0]));
      assert.equal(10, calcModule.calcBrandflaeche(10, [0,0,0,1,1]));
      assert.equal(10, calcModule.calcBrandflaeche(10, [0,0,1,0,0]));
      assert.equal(10, calcModule.calcBrandflaeche(10, [0,0,1,0,1]));
      assert.equal(10, calcModule.calcBrandflaeche(10, [0,0,1,1,0]));
      assert.equal(10, calcModule.calcBrandflaeche(10, [0,0,1,1,1]));
      assert.equal(10, calcModule.calcBrandflaeche(10, [0,1,0,0,0]));
      assert.equal(10, calcModule.calcBrandflaeche(10, [0,1,0,0,1]));
      assert.equal(10, calcModule.calcBrandflaeche(10, [0,1,0,1,0]));
      assert.equal(10, calcModule.calcBrandflaeche(10, [0,1,0,1,1]));
      assert.equal(10, calcModule.calcBrandflaeche(10, [0,1,1,0,0]));
      assert.equal(10, calcModule.calcBrandflaeche(10, [0,1,1,0,1]));
      assert.equal(10, calcModule.calcBrandflaeche(10, [0,1,1,1,0]));
      assert.equal(10, calcModule.calcBrandflaeche(10, [0,1,1,1,1]));
      assert.equal(10, calcModule.calcBrandflaeche(10, [1,0,0,0,0]));
      assert.equal(10, calcModule.calcBrandflaeche(10, [1,0,0,0,1]));
      assert.equal(10, calcModule.calcBrandflaeche(10, [1,0,0,1,0]));
      assert.equal(10, calcModule.calcBrandflaeche(10, [1,0,0,1,1]));
      assert.equal(10, calcModule.calcBrandflaeche(10, [1,0,1,0,0]));
      assert.equal(10, calcModule.calcBrandflaeche(10, [1,0,1,0,1]));
      assert.equal(10, calcModule.calcBrandflaeche(10, [1,0,1,1,0]));
      assert.equal(10, calcModule.calcBrandflaeche(10, [1,0,1,1,1]));
      assert.equal(10, calcModule.calcBrandflaeche(10, [1,1,0,0,0]));
      assert.equal(10, calcModule.calcBrandflaeche(10, [1,1,0,0,1]));
      assert.equal(10, calcModule.calcBrandflaeche(10, [1,1,0,1,0]));
      assert.equal(10, calcModule.calcBrandflaeche(10, [1,1,0,1,1]));
      assert.equal(10, calcModule.calcBrandflaeche(10, [1,1,1,0,0]));
      assert.equal(10, calcModule.calcBrandflaeche(10, [1,1,1,0,1]));
      assert.equal(10, calcModule.calcBrandflaeche(10, [1,1,1,1,0]));
      assert.equal(10, calcModule.calcBrandflaeche(10, [1,1,1,1,1]));
    });
  });

  describe('#calcLwo()', function() {
    it('should return 3138.36', function() {
      assert.equal(3138.36, calcModule.calcLwo("0,5", "2,0", 1060, "4,0"));
      assert.equal(3138.36, calcModule.calcLwo(0.5, 2.0, 1060, 4.0));
    });
    it('should return 3138.36', function() {
      assert.equal(2650, calcModule.calcLwo("0,5", "2,0", 1060, "2,5"));
    });
    it('should return 3138.36', function() {
      assert.equal(3180, calcModule.calcLwo(1, 2.0, 1060, 2.5));
    });
    it('should return ""', function() {
      assert.equal("", calcModule.calcLwo("0,5", "", 1060, 2.5));
      assert.equal("", calcModule.calcLwo("0,5", "2,0", "", 2.5));
    });
  });

  describe('#calcLw()', function() {
    it('should return [1380.36, 124.23]', function() {
      var tmp = calcModule.calcLw(1758, 3138.36)
      assert.equal(tmp[0], 1380.36);
      assert.equal(tmp[1], 124.23);
      tmp = calcModule.calcLw(1758, "3138,36");
      assert.equal(tmp[0], 1380.36);
      assert.equal(tmp[1], 124.23);
      tmp = calcModule.calcLw("1758", 3138.36);
      assert.equal(tmp[0], 1380.36);
      assert.equal(tmp[1], 124.23);
    });
    it('should return [0, 0]', function() {
      var tmp = calcModule.calcLw(1758, 1000)
      assert.equal(tmp[0], 0);
      assert.equal(tmp[1], 0);
      tmp = calcModule.calcLw(1758, 1758)
      assert.equal(tmp[0], 0);
      assert.equal(tmp[1], 0);
    });
  });

  

});
