json.array!(@attendees) do |attendee|
  json.extract! attendee, :id, :card_number, :first_name, :last_name, :middle_name, :title, :org_id, :email, :card_type
  json.url attendee_url(attendee, format: :json)
end
