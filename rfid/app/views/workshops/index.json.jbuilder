json.array!(@workshops) do |workshop|
  json.extract! workshop, :id, :name, :attendee_id, :starts_at, :ends_at, :rescheduled, :room_name, :building_name
  json.url workshop_url(workshop, format: :json)
end
