/*
BME280 I2C Test.ino
This code shows how to record data from the BME280 environmental sensor
using I2C interface. This file is an example file, part of the Arduino
BME280 library.
GNU General Public License
Written: Dec 30 2015.
Last Updated: Oct 07 2017.
Connecting the BME280 Sensor:
Sensor              ->  Board
-----------------------------
Vin (Voltage In)    ->  3.3V
Gnd (Ground)        ->  Gnd
SDA (Serial Data)   ->  A4 on Uno/Pro-Mini, 20 on Mega2560/Due, 2 Leonardo/Pro-Micro
SCK (Serial Clock)  ->  A5 on Uno/Pro-Mini, 21 on Mega2560/Due, 3 Leonardo/Pro-Micro
 */

#include <ESP8266WiFi.h>
#include <ESP8266WiFiMulti.h>
#include <ESP8266HTTPClient.h>
#include <BME280I2C.h>
#include <Wire.h>

#define USE_SERIAL Serial
#define SERIAL_BAUD 115200

ESP8266WiFiMulti WiFiMulti;

BME280I2C bme;    // Default : forced mode, standby time = 1000 ms
                  // Oversampling = pressure ×1, temperature ×1, humidity ×1, filter off,

//////////////////////////////////////////////////////////////////
void setup()
{
  Serial.begin(SERIAL_BAUD);

  while(!Serial) {} // Wait

  Wire.begin();

  while(!bme.begin())
  {
    Serial.println("Could not find BME280 sensor!");
    delay(1000);
  }
   Serial.begin(115200);      // Start Serial 
  USE_SERIAL.begin(115200);
  // USE_SERIAL.setDebugOutput(true);
 
  USE_SERIAL.println();
  USE_SERIAL.println();
  USE_SERIAL.println();
 
  for(uint8_t t = 8; t > 0; t--) {
      USE_SERIAL.printf("[SETUP] WAIT %d...\n", t);
      USE_SERIAL.flush();
      delay(1000);
  }
 
  WiFiMulti.addAP("[SSID]", "[PASS]");
  //WiFiMulti.addAP("Router2-SSI", "Router2-password");

  switch(bme.chipModel())
  {
     case BME280::ChipModel_BME280:
       Serial.println("Found BME280 sensor! Success.");
       break;
     case BME280::ChipModel_BMP280:
       Serial.println("Found BMP280 sensor! No Humidity available.");
       break;
     default:
       Serial.println("Found UNKNOWN sensor! Error!");
  }
}

//////////////////////////////////////////////////////////////////
void loop()
{
   static float temp = 0.0;
   static float pres = 0.0;
   static float hum = 0.0; 

   BME280::TempUnit tempUnit(BME280::TempUnit_Celsius);
   BME280::PresUnit presUnit(BME280::PresUnit_hPa);

    bme.read(pres, temp, hum, tempUnit, presUnit);

   String tempStr;
   tempStr = String(temp,1);
   String presStr;
   presStr = String(pres,0);
   String humStr;
   humStr = String(hum,0);
         
   Serial.println(pres,0);
   Serial.println(temp,1);
   Serial.println(hum,0);
   Serial.println(WiFi.localIP());
 
  HTTPClient http;


  USE_SERIAL.print("[HTTP] begin...\n");
  // configure traged server and url
  String url="http://192.168.178.231/nodes.php?dev_id=7&temperature=" + tempStr + "&pressure=" + presStr + "&voltage=5&humidity=" + humStr;
    http.begin(url); //HTTP
  
 
  USE_SERIAL.print("[HTTP] GET...\n");
  // start connection and send HTTP header
  int httpCode = http.GET();
 
    // httpCode will be negative on error
    if(httpCode > 0) {
        // HTTP header has been send and Server response header has been handled
        USE_SERIAL.printf("[HTTP] GET... code: %d\n", httpCode);
 
        // file found at server
        if(httpCode == HTTP_CODE_OK) {
            String payload = http.getString();
            USE_SERIAL.println(payload);
        }
    } else {
        USE_SERIAL.printf("[HTTP] GET... failed, error: %s\n", http.errorToString(httpCode).c_str());
    }
 
    http.end();
//    delay(60000);   // wait a minute
    delay(900000);  // wait 15 minutes
}
