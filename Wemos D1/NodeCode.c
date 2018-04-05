// Libraries
 
#include <ESP8266WiFi.h>
#include <ESP8266WiFiMulti.h>
#include <ESP8266HTTPClient.h>
 
#define USE_SERIAL Serial
ESP8266WiFiMulti WiFiMulti;
 
int reading = 0;
int iterations = 10;
float voltage = 0.0;
float temperature = 0.0;
 
void setup() {
 
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
 
  WiFiMulti.addAP("Router1-SSI", "Router1-password");
  WiFiMulti.addAP("Router2-SSI", "Router2-password");
} 
 
void loop() 
{
  analogRead(0);         // chuck the first reading away to clear the ADC
  delay(20);
  reading = 0;           // then read ADC pin 10 times and average
  for (int loop = 0; loop < iterations; loop++)
  {
     reading += analogRead(0);
     delay(20);
  } 
   
  voltage = (reading / iterations / 1023.0) * 3.3;
  temperature = (voltage - 0.5) * 100;
  String temp;
  temp = String(temperature);
  Serial.println(temp);
  Serial.println(WiFi.localIP());
 
  HTTPClient http;
 
  USE_SERIAL.print("[HTTP] begin...\n");
  // configure traged server and url
  http.begin("http://ip.of.your.pi/test.php?ipsrc=Test2&temperature="+ temp + "&humidity=1&voltage=1"); //HTTP
 
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
    delay(60000);   // wait a minute
 
}