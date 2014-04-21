json.array!(@surveys) do |survey|
  json.extract! survey, :id, :attendance_id, :complete, :workshop_rating, :speaker_rating, :conference_rating
  json.url survey_url(survey, format: :json)
end
