json.array!(@attendances) do |attendance|
  json.extract! attendance, :id, :attendee_id, :workshop_id, :swipe_time, :status
  json.url attendance_url(attendance, format: :json)
end
