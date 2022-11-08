const getWeatherData = async () => {
  const weatherData = await fetch(
    "https://api.data.gov.sg/v1/environment/2-hour-weather-forecast"
  );
  const parsedWeatherData = await weatherData.json();

  const { area_metadata, items } = parsedWeatherData;

  const { forecasts, update_timestamp } = items[0] || [];
  const updatedDateTime = new Date(update_timestamp);

  const completeData = [];

  forecasts.forEach((fc) => {
    area_metadata.forEach((am) => {
      if (fc.area === am.name) {
        completeData.push({
          area: fc.area,
          prediction: fc.forecast,
          location: am.label_location,
        });
      }
    });
  });
  return { completeData, updatedDateTime };
};

const createMap = () => {
  return L.map("map").setView([1.3763736, 103.7806543], 11);
};

const createMarkers = (map, completeData, updatedDateTime) => {
  L.tileLayer("https://tile.openstreetmap.org/{z}/{x}/{y}.png", {
    maxZoom: 19,
    attribution:
      '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>',
  }).addTo(map);

  const markers = {};
  completeData.forEach((point, index) => {
    markers[index] = L.marker([
      point.location.latitude,
      point.location.longitude,
    ]).addTo(map);

    markers[index]
      .bindPopup(
        `<b>${point.area}</b><br>${
          point.prediction
        }.<br><small>Updated at: ${updatedDateTime.toDateString()} ${updatedDateTime.toTimeString()}</small>`
      )
      .openPopup();
  });
};

(async () => {
  const { completeData, updatedDateTime } = await getWeatherData();

  const map = createMap();

  createMarkers(map, completeData, updatedDateTime);
})();
